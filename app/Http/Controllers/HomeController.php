<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\EditUserProfileRequest;
use App\Http\Requests\NewUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => 'home']);
        parent::__construct();
    }

    public function home()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function users()
    {
        $users = User::paginate(25);
        return view('users.lists')->with(compact('users'));
    }

    public function getEdit($id)
    {
        $userdetail = User::whereId((int) $id)->first();
        return view('users.edit')->with(compact('userdetail'));
    }

    public function getProfileEdit($id)
    {
        $userdetail = User::whereId((int) $id)->first();
        return view('users.profile')->with(compact('userdetail'));
    }


    public function getNewUser()
    {
        return view('auth.register');
    }

    public function postNewUser(NewUserRequest $request, User $users)
    {
        $new_users = $users->create([
            'username' => $request->input('username'),
            'email' => Str::lower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'firstname' => Str::title($request->input('firstname')),
            'lastname' => Str::title($request->input('lastname')),
            'phone'     => $request->input('phone'),
            'role_id'  => $request->input('role'),
        ]);

        if($new_users){
            flash()->success('User Added Successfully!');
        } else {
            flash()->error('An error occurred, try adding the User again!');
        }
        return redirect()->route('user.list');

    }

    public function postEdit(EditUserRequest $request)
    {
        $data = $request->all();
        $update = [
            'firstname' => Str::title($data['firstname']),
            'lastname' => Str::title($data['lastname']),
            'email' => Str::lower($data['email']),
            'phone' => $data['phone'],
            'role_id' => (int)$data['role'],
        ];
        if(!empty($data['password'])){
            $update['password'] = bcrypt($data['password']);
        }
        $user_update = User::whereId((int) $data['user_id'])->update($update);

        if($user_update){
            flash()->success('User Updated Successfully!');
        } else {
            flash()->error('An error occurred, try updating the User again!');
        }

        return redirect()->route('user.list');
    }

    public function postProfileEdit(EditUserProfileRequest $request)
    {
        $data = $request->all();
        $update = [
            'firstname' => Str::title($data['firstname']),
            'lastname' => Str::title($data['lastname']),
            'email' => Str::lower($data['email']),
            'phone' => $data['phone'],
        ];
        if(!empty($data['password'])){
            $update['password'] = bcrypt($data['password']);
        }
        $user_update = User::whereId((int) $data['user_id'])->update($update);

        if($user_update){
            flash()->success('Profile Updated Successfully!');
        } else {
            flash()->error('An error occurred, try again!');
        }

        return redirect()->route('dashboard');
    }

    public function demo()
    {
//        $input = '999';
//        return thcFormater($input);
        $code = QrCode::size(150)->generate('THC0002');
        return $code;
    }

    public function getCashierDesk()
    {
        return view('users.cashierdesk');
    }

    public function getCustomerForCashierDesk(Request $request, Customer $customer)
    {
        if($request->ajax()){

          $thc_customer = $customer->with('profile')->where('thc',$request->input('thc'))->first();
          return $thc_customer;
        }
        return ['error' => 'An error occurred!'];
    }
}
