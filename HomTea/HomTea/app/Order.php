<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id','order_id', 'order_status_id', 'note', 'user_id', 'price',
    ];

    public $incrementing = false;

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function orderStatus()
    {
        return $this->belongsTo('App\OrderStatus');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
