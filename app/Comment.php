<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comment';
    protected $fillable = [
        'body','user_id','product_id','replay','user_id2',
    ];

    public function user()
    {
        return $this->hasMany('App\User','id','user_id');
    }
}
