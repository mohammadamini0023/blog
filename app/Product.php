<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $softDelete = true;
    protected $table='product';
    protected $fillable = [
        'product_id','name','pprice','user_id','color','description','shipping_goods','created_at','updated_at','deleted_at','expiration_at',
    ];
    public function procategory()
    {
        return $this->hasMany('App\Procategory','product_id','product_id');
    }
}
