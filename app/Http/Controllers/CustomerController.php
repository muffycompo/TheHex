<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerProfile;
use App\Http\Requests\NewCustomerRequest;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    protected $customer;
    protected $profile;

    public function __construct()
    {
        parent::__construct();
    }

    public function getNewCustomer()
    {
        return view('customers.new');
    }

    public function postNewCustomer(NewCustomerRequest $request, Customer $customer, CustomerProfile $profile)
    {
        $this->customer = $customer->create([
            'thc' => str_random(6),
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
        }
//        return $customer->with('profile')->get();

        return redirect()->route('customer.list');
    }

    public function getCustomerList(Customer $customer)
    {
        $customers = $customer->paginate(25);
        return view('customers.lists')->with(compact('customers'));
    }

    public function getCustomerEdit($id, Customer $customer)
    {
        $customerdetail = $customer->with('profile')->whereId((int) $id)->first();
        return view('customers.edit')->with(compact('customerdetail'));
    }

    public function postCustomerEdit(NewCustomerRequest $request, Customer $customer, CustomerProfile $profile)
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
        // Flash Completion message here
        flash()->info('Awesome!');
//        return $customer->with('profile')->get();
        return redirect()->route('customer.list');
    }

}
