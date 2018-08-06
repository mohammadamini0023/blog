<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload_image extends Model
{
    protected $table='upload_image';
    protected $fillable = [
        'product_id','path',
    ];
}
