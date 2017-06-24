<?php

namespace App;
use App\Traits\SetKeepConnectionDB;
use Zizaco\Entrust\EntrustPermission;
 
class Permission extends EntrustPermission
{
    use SetKeepConnectionDB;
    
    protected $fillable = ['name','description','display_name'];

 
}