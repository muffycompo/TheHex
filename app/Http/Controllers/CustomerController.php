<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Payment;
use App\CustomerProfile;
use App\Http\Requests\NewCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    protected $customer;
    protected $profile;
    protected $payment;

    public function __construct()
    {
        parent::__construct();
    }

    public function getNewCustomer()
    {
        return view('customers.new');
    }

    public function postNewCustomer(NewCustomerRequest $request, Customer $customer, CustomerProfile $profile, Payment $payment)
    {
        $this->customer = $customer->create([
            'firstname' => Str::title($request->input('firstname')),
            'lastname' => Str::title($request->input('lastname')),
            'email' => Str::lower($request->input('email')),
            'phone' => $request->input('phone'),
        ]);
        if($this->customer){
            $dob = explode('/',$request->input('dob'));
            $dob_piece = [$dob[2],$dob[1],$dob[0]];
            $this->profile = $profile->create([
                'customer_id' => $this->customer->id,
                'dob' => implode('-',$dob_piece),
                'gender_id' => $request->input('gender'),
                'state_id' => $request->input('state_of_origin'),
                'hostel_address' => $request->input('hostel_address'),
                'guardian_name' => Str::words($request->input('guardian_name')),
                'guardian_phone' => $request->input('guardian_phone'),
                'guardian_address' => $request->input('guardian_address'),
            ]);
            // Add Payment Balance
            $this->payment= $payment->create([
                'customer_id' => $this->customer->id,
                'start_balance' => empty($request->input('account_balance')) ? 0 : $request->input('account_balance'),
                'account_balance' => empty($request->input('account_balance')) ? 0 : $request->input('account_balance'),
            ]);
            // Add Customer THC generated code
            $customer->whereId($this->customer->id)->update(['thc' => thcFormater($this->customer->id)]);
            if($this->profile){
                flash()->success('Customer Added Successfully!');
            } else {
                flash()->error('An error occurred, try adding the Customer again!');
            }
        } else {
            flash()->error('An error occurred, try adding the Customer again!');
        }
       return redirect()->route('customer.list');
    }

    public function getCustomerList(Customer $customer)
    {
        $customers = $customer->paginate(25);
        return view('customers.lists')->with(compact('customers'));
    }

    public function getCustomerEdit($id, Customer $customer)
    {
        $customerdetail = $customer->with('profile','payment')->whereId((int) $id)->first();
        return view('customers.edit')->with(compact('customerdetail'));
    }

    public function getCustomerDetail($id, Customer $customer)
    {
        $customerdetail = $customer->with('profile','payment')->whereId((int) $id)->first();
        return view('customers.detail')->with(compact('customerdetail'));
    }

    public function getCustomerDelete($id, Customer $customer)
    {
        $customerdetail = $customer->whereId((int) $id)->delete();

        if(! $customerdetail){
            flash()->error('An error occurred, try deleting the Customer again!');
        } else {
            flash()->success('Customer Deleted Successfully!');
        }
        return redirect()->back();
    }

    public function postCustomerEdit(NewCustomerRequest $request, Customer $customer, CustomerProfile $profile, Payment $payment)
    {
        $id = $request->input('customer_id');
        $this->customer = $customer->whereId((int)$id)->update([
            'firstname' => Str::title($request->input('firstname')),
            'lastname' => Str::title($request->input('lastname')),
            'email' => Str::lower($request->input('email')),
            'phone' => $request->input('phone'),
        ]);
        $dob = explode('/',$request->input('dob'));
        $dob_piece = [$dob[2],$dob[1],$dob[0]];
        $this->profile = $profile->where('customer_id',(int)$id)->update([
            'dob' => implode('-',$dob_piece),
            'gender_id' => $request->input('gender'),
            'state_id' => $request->input('state_of_origin'),
            'hostel_address' => $request->input('hostel_address'),
            'guardian_name' => Str::words($request->input('guardian_name')),
            'guardian_phone' => $request->input('guardian_phone'),
            'guardian_address' => $request->input('guardian_address'),
        ]);
        $this->payment = $payment->where('customer_id',(int)$id)->update([
            'account_balance' => $request->input('account_balance'),
        ]);
        if(! $this->customer && ! $this->profile){
            flash()->error('An error occurred, try updating the Customer again!');
        } else {
            flash()->success('Customer Updated Successfully!');
        }
        return redirect()->route('customer.list');
    }

    public function postCustomerDetailPhoto($id, Request $request, CustomerProfile $profile)
    {
        $this->validate($request,[
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);

        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $name = 'customer_photo_' . $id . '.' . $extension;
        $file->move('customers/photos',$name);

        $demo = $profile->where('customer_id',(int) $id)->update(['photo_path' => '/customers/photos/' . $name]);

        return $demo;
    }

}
