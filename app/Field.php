<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table='field';
    protected $fillable = [
        'field_id','area','suburb','number_rooms','Build','Official_document','brand','color','Function','type_sim','created_at','updated_at',
    ];

}
