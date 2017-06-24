<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

class Asignatura extends Base
{
    function __construct(Request $request) {
        
        $this->setMiddleware($request);
        
        
        $this->set_methods(array('create','edit','delete','consult','createII'));
        
    }
}
