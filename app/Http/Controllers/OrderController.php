<?php

namespace App\Http\Controllers;

use App\Order;
use App\Payment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewOrderRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class OrderController extends Controller
{
    protected $orders;
    public function __construct()
    {
        parent::__construct();
    }

    public function getNewOrder()
    {
        return view('orders.new');
    }

    public function postNewOrder(NewOrderRequest $request, Order $order, Payment $payment)
    {
        $customer_id = thcToCustomerId($request->input('thc'));

        $balance = $payment->where('customer_id',$customer_id)->first(['account_balance']);
        $order_amount = (int) $request->input('order_amount');

        if($balance->account_balance >= $order_amount){
            $this->orders = $order->create([
                'order_amount' => $order_amount,
                'order_category_id' => $request->input('order_category'),
                'customer_id' => $customer_id
            ]);

            // Deduct order amount from balance
            $payment->where('customer_id',$customer_id)->update([
                'account_balance' => ($balance->account_balance - $order_amount)
            ]);

            if($this->orders->id){
                $order->whereId($this->orders->id)->update(['receipt_number' => thcReceiptNoGenerator($this->orders->id)]);
                flash()->success('Order Completed Successfully!');
            } else {
                flash()->error('An error occurred, try placing the Order again!');
            }
        } else {
            flash()->error('Account Balance ('. nairaFormater($balance->account_balance) .') is too low to complete this Order!');
        }
        return redirect()->route('order.new');

    }

    public function getCustomerNewOrder(Request $request, Order $order, Payment $payment)
    {
        if($request->ajax()){

            $customer_id = $request->input('customer_id');
            $order_amount = $request->input('amount') != '' ? $request->input('amount') : 0;
            $category = $request->input('category');

            $balance = $payment->where('customer_id',$customer_id)->first(['account_balance']);

            if($customer_id != '' && $order_amount != ''){
                if($order_amount == 0){
                    return ([
                        'message' => 'Order Amount of ('. nairaFormater($order_amount) .') is too small!',
                        'title'   => 'Warning!',
                        'type'    => 'warning'
                    ]);

                } else if($balance->account_balance >= $order_amount){
                    $this->orders = $order->create([
                        'order_amount' => $order_amount,
                        'order_category_id' => $category,
                        'customer_id' => $customer_id
                    ]);

                    // Deduct order amount from balance
                    $final_balance = $balance->account_balance - $order_amount;
                    $payment->where('customer_id',$customer_id)->update([
                        'account_balance' => $final_balance
                    ]);

                    if($this->orders->id){
                        $order->whereId($this->orders->id)->update(['receipt_number' => thcReceiptNoGenerator($this->orders->id)]);
                        return ([
                            'message' => 'Your order of '. nairaFormater($order_amount) .' has been completed successfully!',
                            'title'   => 'Order Complete!',
                            'type'    => 'success',
                            'amount_balance'    => $final_balance
                        ]);
                    } else {
                        return ([
                            'message' => 'An error occurred while completing your Order!',
                            'title'   => 'Error!',
                            'type'    => 'error'
                        ]);
                    }
                } else {
                    return ([
                        'message' => 'Account Balance ('. nairaFormater($balance->account_balance) .') is too low to complete your Order of '. nairaFormater($order_amount) .'!',
                        'title'   => 'Warning!',
                        'type'    => 'warning'
                    ]);
                }
            } else {
                return ([
                    'message' => 'We can\'t seem to find your record!',
                    'title'   => 'Error!',
                    'type'    => 'error'
                ]);
            }

        }
    }

    public function getOrderList(Order $order)
    {
        $orders = $order->orderBy('created_at','DESC')->paginate(25);
        return view('orders.lists')->with(compact('orders'));
    }

    public function getOrderPrint($id, Order $order)
    {
        $customer_order = $order->whereId((int) $id)->first();
        return view('orders.print')->with(compact('customer_order'));
    }

    public function getOrderCancel($id, Order $order, Payment $payment)
    {
        $customer_order = $order->whereId((int) $id)->first();
        $amount = $customer_order->order_amount;
        $customer_id = $customer_order->customer_id;
        $delete = $order->whereId((int) $id)->delete();
        if($delete){
//            ->increment('votes', 5);
            $payment->where('customer_id',(int) $customer_id)->increment('account_balance',$amount);
            flash()->success('Order #'. $id .' has been cancelled and '. nairaFormater($amount) .' refunded to ' . customerFullname($customer_id) . '!');
        } else {
            flash()->error('An error occurred while cancelling Order #' . $id . '!');
        }
        return redirect()->back();
    }

}
