<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Base extends Controller
{
    private $m;
    public function setMiddleware($request){
        
        $param = $request->route()->parameter('param');
        $this->middleware('permission:'.str_replace('II','',$param));
    }
    public function index($param)
    {   
        
        if (in_array($param, $this->m ) ) {
            return view('menu.'.strtolower($this->get_class_name()).'.'.$param);
        } else
        {
            return redirect()->route('home');
        }
    }
    function get_class_name()
    {
        $classname = get_class($this);
        if ($pos = strrpos($classname, '\\')) return substr($classname, $pos + 1);
        
        return $pos;
    }
    function set_methods($methods)
    {
        $this->m = $methods;
    }
}