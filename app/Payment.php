<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $table = 'payments';
    protected $fillable = [];
    protected $dates = ['deleted_at'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
