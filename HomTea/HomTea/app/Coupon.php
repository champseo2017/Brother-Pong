<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code', 'promotion_id', 'user_id', 'status',
    ];

    protected $primaryKey = 'code';

    public $incrementing = false;

    public function promotion()
    {
        return $this->belongsTo('App\Promotion');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
