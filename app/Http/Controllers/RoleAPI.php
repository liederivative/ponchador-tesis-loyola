<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Role;
use App\Permission;
use JavaScript;

use Illuminate\Http\Request;

class RoleAPI extends Controller
{
    /**
     * GET /admin/role
     */
    public function index()
    {
        
        $roles = Role::orderBy('created_at','desc')->get();
        $new_arr = array();
        foreach($roles as $role){
            $perms = $role->perms()->get();
            if($perms){
                $permRole = array();
                foreach($perms as $perm){
                    array_push($permRole,$perm->name);
                }
                $role['perm'] = $permRole;
            }
            array_push($new_arr,$role);
        }
        return $roles;
    }
    public function getPermissions($array){
        $perms = array();
        foreach($array['perm'] as $perm){
            $permFound = Permission::where('name',$perm)->get()->first();
            if($permFound) array_push($perms,$permFound);
        }
        return $perms;
    }
    public function addPermissions($update,$role){
        if(array_key_exists('perm',$update)){ 
                $perms = $this->getPermissions($update);                
                //add role
                if($perms){
                    $role->detachPermissions($role->perms);
                    $role->attachPermissions($perms);
                }
            }
    }
    /**
     * GET	/admin/role/create
     */
    public function create()
    {
        //
    }
    /**
     * GET	/admin/user/search/{name}
     */
    public function search($unique)
    {
        return Role::where('name',$unique)->get()->first();;
    }
    /**
     * PUT	/admin/role
     */
    public function store()
    {

        $this->validate(request(),[
            'name'=>'string|required'
        ]);
        
        $array = request(['name','description','display_name','perm']);
        if($array['name'] == 'root'){
            return ['error'=>'name,ya existe'];
        }
        try{
            $role = Role::create($array);
            $this->addPermissions($array,$role);
            
        }catch (\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                // houston, we have a duplicate entry problem
                return ['error'=>'name, ya existe'];
            }
        }
        return ['success'=>'role creado','role'=>$role];
    }

    /**
     * GET	/admin/role/{id}
     */
    public function show($id)
    {
        //
        $role = Role::findOrFail($id);
        return $role;
    }

    /**
     * GET	/admin/role/{id}/edit
     */
    public function edit(Role $role)
    {
        //
    }
    
    /**
     * PUT/PATCH	/admin/role/{id}
     */
    public function update($id)
    {
        $this->validate(request(),[
            'name'=>'string|required'
        ]);
        // can only update this fields
        $update = request(['name','description','display_name','perm']);
        
        $role = Role::findOrFail($id);
        $role->fill($update)->save();
        $this->addPermissions($update,$role);
        
        return ['role'=>$role];
    }

    /**
     * DELETE	/admin/role/{id}
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        if($role->name !='root'){
            $role->delete();
            return ['role'=>$role];
        }
        abord(422);
        
    }
}
