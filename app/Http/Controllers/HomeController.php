<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\EditUserRequest;
use App\User;
use Illuminate\Support\Str;

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
        return User::whereId((int) $data['user_id'])->update($update);
    }

    public function demo()
    {
        return Customer::with('profile')->get();
    }
}
