<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewOrderRequest;

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

    public function postNewOrder(NewOrderRequest $request, Order $order)
    {
        $this->orders = $order->create([
            'order_amount' => $request->input('order_amount'),
            'order_category_id' => $request->input('order_category'),
            'customer_id' => thcToCustomerId($request->input('thc'))
        ]);

        if($this->orders->id){
            flash()->success('Order Completed Successfully!');
        } else {
            flash()->error('An error occurred, try placing the Order again!');
        }
        return redirect()->route('order.new');

    }

    public function getOrderList(Order $order)
    {
        $orders = $order->paginate(25);
        return view('orders.lists')->with(compact('orders'));
    }

    public function getOrderPrint($id)
    {
        return view('orders.print')->with(compact('id'));
    }

}
