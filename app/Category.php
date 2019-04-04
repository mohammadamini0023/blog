<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    protected $fillable = [
        'category_id','category','parent_id',
    ];
    
    public function children(){
        return $this->hasMany('App\Category', 'parent_id', 'category_id');
    }
}
