<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    protected $fillable = [
        'category_id','category','parent_id',
    ];

    public function procategory()
    {
        return $this->belongsTo('App\Procategory','category_id','category_id');
    }

    public function children(){
        return $this->hasMany('App\Category', 'parent_id', 'category_id');
    }
}
