<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Role;
use App\Permission;
use JavaScript;

use Illuminate\Http\Request;

class PermAPI extends Controller
{
    /**
     * GET /admin/perm
     */
    public function index()
    {
        
        $perms = Permission::orderBy('created_at','desc')->get();

        return $perms;
    }

    /**
     * GET	/admin/perm/create
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
        return Permission::where('name',$unique)->get()->first();;
    }
    /**
     * PUT	/admin/perm
     */
    public function store()
    {

        $this->validate(request(),[
            'name'=>'string|required'
        ]);
        
        $array = request(['name','description','display_name']);
        try{
            $perm = Permission::create($array);
            
        }catch (\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                // houston, we have a duplicate entry problem
                return ['error'=>'name, ya existen'];
            }
        }
        return ['success'=>'perm creado','perm'=>$perm];
    }

    /**
     * GET	/admin/perm/{id}
     */
    public function show($id)
    {
        //
        $perm = Permission::findOrFail($id);
        return $perm;
    }

    /**
     * GET	/admin/perm/{id}/edit
     */
    public function edit(Permission $perm)
    {
        //
    }

    /**
     * PUT/PATCH	/admin/perm/{id}
     */
    public function update($id)
    {
        $this->validate(request(),[
            'name'=>'string|required'
        ]);
        // can only update this fields
        $update = request(['name','description','display_name']);
        
        $perm = Permission::findOrFail($id);
        $perm->fill($update)->save();
        
        return ['perm'=>$perm];
    }

    /**
     * DELETE	/admin/perm/{id}
     */
    public function destroy($id)
    {
        $perm = Permission::findOrFail($id);
        $perm->delete();
        return ['perm'=>$perm];
    }
}
