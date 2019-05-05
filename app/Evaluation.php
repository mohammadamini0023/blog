<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table='evaluation';
    protected $fillable = [
        'quality','worth_buying','designing','user_id','product_id','description',
    ];
}
