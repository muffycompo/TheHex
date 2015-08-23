<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected $redirectPath = '/dashboard';
    protected $loginPath = '/';
    protected $username = 'username';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getLogout','getHome','getLogin','postLogin']]);
        parent::__construct();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email'    => 'email',
            'phone'     => 'required|numeric',
            'username'  => 'required|max:20|unique:users',
            'password'  => 'required|min:5',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => Str::lower($data['email']),
            'password' => bcrypt($data['password']),
            'firstname' => Str::title($data['firstname']),
            'lastname' => Str::title($data['lastname']),
            'phone'     => $data['phone'],
            'role_id'  => $data['role'],
        ]);
    }

}
