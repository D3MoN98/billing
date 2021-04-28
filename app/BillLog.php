<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillLog extends Model
{
    protected $fillable = [
        'bill_id', 'date', 'time_in', 'time_out', 'lunch_time', 'day', 'total_time'
    ];
}