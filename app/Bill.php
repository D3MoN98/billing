<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'added_by', 'user_id', 'service_id', 'service_time', 'price', 'is_gst'
    ];

    protected $casts = [
        'is_gst' => 'boolean',
    ];

    /**
     * Get the service associated with the Bill
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function service()
    {
        return $this->belongsTo('App\Service');
    }

    /**
     * Get the user associated with the Bill
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}