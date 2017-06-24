<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Role;
use JavaScript;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserAPI extends Controller
{
    /**
     * GET /admin/user
     */
//    protected $User;
    
    public function __construct(){
        
    }
    public function index()
    {
        //
        $users = User::orderBy('created_at','desc')->paginate(15);
//        print_r($users[0]->roles()->role_id);
        $new_arr = array();
        foreach($users as $user){
            $role = $user->roles()->get()->first();
            if($role){
                $user['role'] = $role->name;
            }
            array_push($new_arr,$user);
        }
        return $new_arr;
    }

    /**
     * GET	/admin/user/create
     */
    public function create()
    {
        //
    }
    /**
     * GET	/admin/user/search/{username||email}
     */
    public function search($unique)
    {
        
        $username = User::where('username',$unique)->get()->first();
        $email = User::where('email',$unique)->get()->first();
        $send = ($username?$username:$email);
        return $send;
    }

    /**
     * PUT	/admin/user
     */
    public function store()
    {
        $request = request();
        $this->validate($request,[
            'email'=>'email',
            'username'=>'string'
        ]);
        
        $array = $request->all();
        $array['password'] = bcrypt($array['password']);
//        dd(isset($array['connection']));
        $user = User::create($array);
        try{
            
            if(array_key_exists('role',$array)){
                $role = Role::where('name',$array['role'])->get()->first();
                //add role
                $user->attachRole($role);
            }

        }catch (\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                // houston, we have a duplicate problem
                return ['error'=>'username o email, ya existen'];
            }
        }
        return ['success'=>'usuario creado','user'=>$user];
    }

    /**
     * GET	/admin/user/{id}
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        return $user;
    }

    /**
     * GET	/admin/user/{id}/edit
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * PUT/PATCH	/admin/user/{id}
     */
    public function update($id)
    {
        $this->validate(request(),[
            'email'=>'email',
            'username'=>'string'
        ]);
        // can only update this fields
        $update = request(['email','username','password','firtaname','lastname','id_fingerprint','role']);
        if(array_key_exists('password',$update)){
            if($update['password'] == '******'){
                unset($update['password']);
            }else{
                $update['password'] = bcrypt($update['password']); 
            }
            
        }
        
        $user = User::findOrFail($id);
        $user->fill($update)->save();
        if(array_key_exists('role',$update)){
            
                $role = Role::where('name',$update['role'])->get()->first();
                //add role
                $user->detachRoles($user->roles);
                $user->attachRole($role);
            }
        
        
        return ['user'=>$user];
    }

    /**
     * DELETE	/admin/user/{id}
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->username != 'root'){
            $user->delete();
            return ['user'=>$user];
        }
        abort(422);
            
    }
}
