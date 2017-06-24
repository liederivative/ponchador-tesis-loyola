<?php

namespace App;
use App\Traits\SetKeepConnectionDB;
use Zizaco\Entrust\EntrustRole;
 
class Role extends EntrustRole
{
    use SetKeepConnectionDB;
    
    protected $fillable = ['name','description','display_name'];
    
}
