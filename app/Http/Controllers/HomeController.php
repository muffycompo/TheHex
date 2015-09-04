<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\EditUserProfileRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\NewUserRequest;
use App\Order;
use App\User;
use Bican\Roles\Exceptions\PermissionDeniedException;
use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if ($this->loggedInUser || $this->loggedInViaRememberMe) {
            return redirect()->route('dashboard');
        }
        return view('home');
    }

    public function dashboard(Order $order, Customer $customer)
    {
        $orders = $order->dailySalesForChart();

        return view('dashboard')
            ->with('order_date', $orders->lists('order_date'))
            ->with('daily_sales', $orders->lists('daily_sales'))
            ->with('total_sales', $order->todaySalesTotalSale())
            ->with('new_customers', $customer->newCustomersToday());
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
        if($this->loggedInUser->id != (int) $id){
            throw new PermissionDeniedException(new Permission());
        }
        $userdetail = User::whereId((int) $id)->first();
        return view('users.profile')->with(compact('userdetail'));
    }


    public function getNewUser()
    {
        return view('auth.register');
    }

    public function postNewUser(NewUserRequest $request, User $users)
    {
        $role_id = $request->input('role');
        $new_users = $users->create([
            'username' => $request->input('username'),
            'email' => Str::lower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'firstname' => Str::title($request->input('firstname')),
            'lastname' => Str::title($request->input('lastname')),
            'phone'     => $request->input('phone'),
            'role_id'  => $role_id,
        ]);

        if($new_users){
            $role = Role::find($role_id);
            $new_users->attachRole($role);
            flash()->success('User Added Successfully!');
        } else {
            flash()->error('An error occurred, try adding the User again!');
        }
        return redirect()->route('user.list');

    }

    public function postEdit(EditUserRequest $request, User $users)
    {
        $data = $request->all();
        $role_id = (int)$data['role'];
        $user_id = $data['user_id'];
        $update = [
            'firstname' => Str::title($data['firstname']),
            'lastname' => Str::title($data['lastname']),
            'email' => Str::lower($data['email']),
            'phone' => $data['phone'],
            'role_id' => $role_id,
        ];
        if(!empty($data['password'])){
            $update['password'] = bcrypt($data['password']);
        }
        $user_update = $users->whereId((int) $user_id)->update($update);

        if($user_update){
            $role = Role::find($role_id);
            $users->detachAllRoles();

            $adminUser = $users->find($user_id);
            $adminUser->attachRole($role);

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

    public function getCashierDesk()
    {
        return view('users.cashierdesk');
    }

    public function getCustomerForCashierDesk(Request $request, Customer $customer)
    {
        if($request->ajax()){

          $thc_customer = $customer->with('profile','payment')->where('thc',$request->input('thc'))->first();
          return $thc_customer;
        }
        return ['error' => 'An error occurred!'];
    }

    public function demo(Order $order)
    {
        return generateQRCode('THC0001');
//        $code = QrCode::size(150)->generate('THC0002');
//        return $code;
    }


}
