<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Customer extends Model
{
    use SoftDeletes;
    protected $table = 'customers';
    protected $dates = ['deleted_at'];
    protected $fillable = ['thc','firstname','lastname','email','phone'];

    public function profile()
    {
        return $this->hasOne('App\CustomerProfile');
    }

    public function order()
    {
//        return $this->hasOne('App\Order');
        return $this->hasMany('App\Order');
    }

    public function payment()
    {
        return $this->hasOne('App\Payment');
    }

    public function newCustomersToday()
    {
        $today = Carbon::now()->format('d-m-Y');
        $todayCustomer = DB::select(DB::raw("SELECT thc,firstname,lastname FROM customers WHERE deleted_at IS NULL AND DATE_FORMAT(created_at,'%d-%m-%Y') = ? LIMIT 5"),[$today]);
        return $todayCustomer;
    }

}
