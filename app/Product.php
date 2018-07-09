<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='product';
    protected $fillable = [
        'product_id','name','pprice','user_id','color','description','shipping_goods','expiration_at',
    ];
}
