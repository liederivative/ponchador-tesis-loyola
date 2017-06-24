<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Role;
use App\Permission;
use JavaScript;

use Illuminate\Http\Request;
use App\Traits\NoORMQueries;
use Illuminate\Contracts\Filesystem\Factory;

class UniAPI extends Controller
{
    use NoORMQueries;
    /**
     * GET /admin/uni
     */
    public function index()
    {
        
//        $unis = Permission::orderBy('created_at','desc')->get();
//
//        return $unis;
        return $this->getExistingDBs();
    }

    /**
     * GET	/admin/uni/create
     */
    public function create()
    {
        //
    }
    /**
     * GET	/admin/uni/search/{name}
     */
    public function search($unique)
    {
        $list = $this->getExistingDBs();
        $cond = '';
        foreach($list as $db){
            $cond = (array_key_exists($unique,$db))?$db:'';
            if($cond){
                
                $cond = ['name'=>$cond[array_keys($cond)[0]],'database'=>array_keys($cond)[0]];
                break;
            }
        }
        
        return $cond;
    }
    /**
     * PUT	/admin/uni
     */
    public function store()
    {
            $request = request()->database;
            $name = ((strpos($request, 'uni_') === 0)?$request:false);
            $nose = $this->createDBforUni($name);
            if( isset($nose['success'])){
                $result = $this->createSchemaUni($name);
                return $result;
            }
            return $nose;
    }
     /**
     * PUT	/admin/uni/seed
     */
    public function seed()
    {
        $name = request()->name;
        $nose = $this->seedDB($name);
        return $nose;
    }
    /**
     * PATCH	/admin/uni/reset/{uni}
     */
    public function resetUser($name)
    {
        
        return $this->resetRootPassword($name);
    }

    /**
     * GET	/admin/uni/{name}
     */
    public function show($id)
    {
        //
    }

    /**
     * GET	/admin/uni/{name}/edit
     */
    public function edit()
    {
        //
    }

    /**
     * PUT/PATCH	/admin/uni/{name}
     */
    public function update($name)
    {

    }

    /**
     * DELETE	/admin/uni/{name}
     */
    public function destroy($name)
    {
    
        return $this->deleteDB($name);
    }
}
