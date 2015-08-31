<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rollover extends Model
{
    protected $table = 'rollovers';

    protected $fillable = ['rollover_from_user','rollover_to_user','rollover_amount'];

}
