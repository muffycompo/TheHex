<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    public $timestamps = false;

    protected $fillable = ['thc','firstname','lastname','email','phone'];

    public function profile()
    {
        return $this->hasOne('App\CustomerProfile');
    }

    public function order()
    {
        return $this->hasOne('App\Order');
    }
}
