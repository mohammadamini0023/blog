<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procategory extends Model
{
    protected $table=procategory;
    protected $fillable = [
        'category_id','product_id'
    ];

    public function category()
    {
        return $this->hasMany('App\Category','category_id','category_id');
    }

    public function product()
    {
        return $this->hasMany('App\Product','product_id','product_id');
    }

}
