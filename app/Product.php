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
        'product_id','user_id','pcity','field_id',
        'Coordinates','pprice','title_product',
        'body_product','expiration','confirm_manager',
        'sale_goods',
    ];
    public function procategory()
    {
        return $this->hasMany('App\Procategory','product_id','product_id');
    }

    public function upload_image()
    {
        return $this->hasMany('App\Upload_image','product_id','product_id');
    }


    public function bidding()
    {
        return $this->hasMany('App\Bidding','product_id','product_id');
    }

    public function city()
    {
        return $this->hasMany('App\City','city_id','pcity');
    }
    public function field()
    {
        return $this->hasMany('App\Field','field_id','field_id');
    }
    public function comment()
    {
        return $this->hasMany('App\Comment','product_id','product_id');
    }
}
