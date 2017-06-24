<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\SetKeepConnectionDB;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait, SetKeepConnectionDB;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $connection = false;
    protected $fillable = [
        'firstname','lastname', 'email', 'password','username','id_fingerprint'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
    
    public function setDBName($db){
        $this->connection = $db;
    }
    
    
}
