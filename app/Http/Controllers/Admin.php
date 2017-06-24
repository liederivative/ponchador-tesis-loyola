<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use JavaScript;
use App\User;
use Auth;

class Admin extends Controller
{
    
    public function index(){
        $user = Auth::user();
        try{
            $role = $user->roles[0];
            //try if perms does not exists
            $perms = ($role?$role->perms[0]['name']:false);
            $role = ($role?$role->name:false);
            JavaScript::put([
                'name' => $user->username,
                'role' => $role,
                'perm' => $perms,
                'zeta' => config('database.default')
            ]);
            return view('admin.home');
        }catch(\Exception $e){
            dd($e);
            JavaScript::put([
                'name' => $user->username,
                'role' => '',
                'perm' => '',
                'zeta' => config('database.default')
            ]);
            return view('admin.home');
        }
        
        
    }
    public function logout(){
        
        Auth::logout();
        return ['status'=>'OK'];
        
    }
}