<?php

namespace App\Http\Controllers;

use App\Rollover;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewRolloverRequest;
use App\Payment;

class RolloverController extends Controller
{
    protected $rollovers;
    public function __construct()
    {
        parent::__construct();
    }

    public function getNewRollover()
    {
        return view('rollovers.new');
    }

    public function postNewRollover(NewRolloverRequest $request, Rollover $rollover, Payment $payment)
    {
        if($request->input('from_thc') == $request->input('to_thc')){
            flash()->error('You can not rollover to the same Customer!');
        } else {
            $customer_from_id = thcToCustomerId($request->input('from_thc'));
            $customer_to_id = thcToCustomerId($request->input('to_thc'));

            $from_balance = $payment->where('customer_id',$customer_from_id)->first(['account_balance']);
//            $rollover_amount = (int) $request->input('rollover_amount');

            if($from_balance->account_balance > 0){
                $this->rollovers = $rollover->create([
                    'rollover_amount' => $from_balance->account_balance,
                    'rollover_from_user' => $customer_from_id,
                    'rollover_to_user' => $customer_to_id
                ]);

                // Rollover remaining amount
                $payment->where('customer_id',$customer_from_id)->decrement('account_balance',$from_balance->account_balance);
                $payment->where('customer_id',$customer_to_id)->increment('account_balance',$from_balance->account_balance);

                if($this->rollovers->id){
                    // Should we delete / deactivate account?
                    flash()->success( nairaFormater($from_balance->account_balance) . ' was rolled over from '.customerFullname($customer_from_id).' to '.customerFullname($customer_to_id).'!');
                } else {
                    flash()->error('An error occurred, try rolling over again!');
                }
            } else {
                flash()->error('You can not rollover ('. nairaFormater($from_balance->account_balance) .') to another Customer!');
            }
        }
        return redirect()->route('rollover.list');

    }

    public function getRolloverList(Rollover $rollover)
    {
        $rollovers = $rollover->orderBy('created_at','DESC')->paginate(25);
        return view('rollovers.lists')->with(compact('rollovers'));
    }


    public function getRolloverCancel($id, Rollover $rollover, Payment $payment)
    {
        $customer_rollover = $rollover->whereId((int) $id)->first();
        $amount = $customer_rollover->rollover_amount;
        $rollover_from_id = $customer_rollover->rollover_from_user;
        $rollover_to_id = $customer_rollover->rollover_to_user;
        $delete = $rollover->whereId((int) $id)->delete();
        if($delete){
            $payment->where('customer_id',(int) $rollover_from_id)->increment('account_balance',$amount);
            $payment->where('customer_id',(int) $rollover_to_id)->decrement('account_balance',$amount);
            flash()->success(nairaFormater($amount) . ' has been rolled over from '.customerFullname($rollover_to_id).' to ' . customerFullname($rollover_from_id) . '!');
        } else {
            flash()->error('An error occurred while rolling over ' . nairaFormater($amount) . ' back to '.customerFullname($rollover_from_id).'!');
        }
        return redirect()->back();
    }


}
