<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class Clase extends Base
{
    function __construct() {
        $this->set_methods(array('create','edit','consult','delete','editII','retake'));
    }
}