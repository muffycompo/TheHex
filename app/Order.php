<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['customer_id','order_category_id','order_amount'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
