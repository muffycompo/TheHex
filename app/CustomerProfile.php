<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerProfile extends Model
{
    protected $table = 'customer_profiles';

    protected $fillable = ['customer_id', 'dob', 'gender_id', 'state_id', 'hostel_address', 'guardian_name', 'guardian_phone', 'guardian_address', 'photo_path'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
