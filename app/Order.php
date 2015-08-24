<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
//    use SoftDeletes;
    protected $table = 'orders';
//    protected $dates = ['deleted_at'];
    protected $fillable = ['customer_id','order_category_id','order_amount'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
