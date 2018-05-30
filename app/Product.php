<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='product';
    protected $fillable = [
        'name','pprice','category','user_id','color','description','shipping_goods','expiration_at',
    ];
}
