<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AskBox extends Model
{
    protected $table = 'ask_box';

    protected $fillable = [
        'user_id', 'email', 'subject', 'message', 'answer', 'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
