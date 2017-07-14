<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IProfesor extends Model
{
    protected $table = 'profesores';
    
//    protected $fillable = [
//        'EmplID','RecDate', 'RecTime', 'OperDate','oper_uni'
//    ];
//
//    protected $hidden = [
//        'created_at','updated_at'
//    ];
    
    public function fingerid(){
        return $this->hasMany('App\Irecords', 'EmplID', 'PMatricula');
    }
}
