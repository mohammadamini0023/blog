<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload_image extends Model
{
    protected $table='upload_image';
    protected $fillable = [
        'product_id','path',
    ];
    public function upload_image()
    {
        return $this->belongsTo('App\Product','product_id','product_id');
    }
}
