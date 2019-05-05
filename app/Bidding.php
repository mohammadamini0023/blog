<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
  
    protected $table='bidding';
    protected $fillable = [
        'user_id','product_id','bprice',
    ];

    public function user()
    {
        return $this->hasMany('App\User','id','user_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product','product_id','product_id');
    }


}
