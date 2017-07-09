<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Erecords extends Model
{
//    function __construct($parameters = array()) {
//        foreach($parameters as $key => $value) {
//            $this->$key = $value;
//        }
//    }
    
    protected $table = 'AtdRecord';
    
    protected $hidden = [
        'SerialId','CardNo','IsAuto','VerifyMode','EquNo','InOutType','OperId','Remark','Checker','CheckDate','PersonalRec'
    ];
    
    public function getRecords()
    {
        $data = $this->all();
    }
}
