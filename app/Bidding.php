<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    protected $table='bidding';
    protected $fillable = [
        'user_id','product_id','bprice',
    ];
}
