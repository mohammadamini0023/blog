<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Find extends Model
{
    protected $table='find';
    protected $fillable = [
        'user_id','find',
    ];

}
