<?php 
namespace App\Traits;

trait setKeepConnectionDB
{
    public function __construct(array $attributes = array()){
//        if(isset($attributes['connection'])){
//            unset($attributes['connection']);
//        }
        parent::__construct($attributes);
        keepConnection($this);
    }
}