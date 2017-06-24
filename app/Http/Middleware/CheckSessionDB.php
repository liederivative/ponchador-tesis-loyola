<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;
use Closure;

use Cookie;
use Config;

use DB;
use App\User;
use Auth;
use Session;


class CheckSessionDB
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private $defaultdb;
    public function __construct(){
//        $this->defaultdb = env('DB_DATABASE'); 
    }
    
    public function handle($request, Closure $next)
    {
        // TODO: obtain data from ponches 
        dd('middleware');
        
        return $next($request);
    }
}
