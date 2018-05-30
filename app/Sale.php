<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table='sale';
    protected $fillable = [
        'user_id','product_id','sprice','payment_getway',
    ];
}
