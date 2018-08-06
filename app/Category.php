<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    protected $fillable = [
        'user_id','category','description',
    ];

    public function procategory()
    {
        return $this->belongsTo('App\Procategory','category_id','category_id');
    }
}
