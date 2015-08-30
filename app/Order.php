<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
    
    public function dailySalesForChart()
    {
        return $this->select(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y') AS order_date,
                              SUM(order_amount) AS daily_sales"))
            ->groupBy('order_date')
            ->limit(7);
    }
    public function todaySalesTotalSale()
    {
        $today = Carbon::now()->format('d-m-Y');
        $todaySale = DB::select(DB::raw("SELECT SUM(order_amount) AS total_sales FROM orders WHERE DATE_FORMAT(created_at,'%d-%m-%Y') = ?"),[$today]);
        return $todaySale[0];
    }
}
