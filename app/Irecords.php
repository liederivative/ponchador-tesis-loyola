<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Irecords extends Model
{
    protected $table = 'records';
    
    protected $fillable = [
        'EmplID','RecDate', 'RecTime', 'OperDate','oper_uni'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
