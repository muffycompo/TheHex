<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    protected $table = 'customers';
    public $timestamps = false;
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

}
