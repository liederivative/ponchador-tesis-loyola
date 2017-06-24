<?php 
namespace App\Traits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Factory;
use App\User;

trait NoORMQueries
{
    protected $newDateFormat = 'd.m.Y H:i';


    // return DB of Instance SQL
    public function getExistingDBs(){
        
        $databases = DB::select('SHOW DATABASES');
        $dbs = array();
        foreach($databases as $db){
            $name = $db->Database;
            //just the ones that starts with uni
            if($name != 'mescyt_ponche' && strpos($name, 'uni') === 0 ) array_push($dbs,[$name => str_replace('uni_','',$name)] );
        }
        return $dbs;

    }

    // Create new DB for Uni
    public function createDBforUni($name){
        try{
            $result = ($name)?DB::statement('CREATE DATABASE IF NOT EXISTS '.$name):false;
            return $result?['success'=>'DB creada']:['error'=>'No name'];
        }catch (\Illuminate\Database\QueryException $e){
            if($e->getCode() =='HY000'){
                return ['error'=>'DB ya existe'];
            }else{
               return ['error'=>$e->getCode()]; 
            }
            
        }  
        

    }

    // Create Schema for new Uni DB;
    public function createSchemaUni($name){
        $current_db = session('selected_database'); 
        try{
            setSessionDBConfig($name);
            session(['selected_database'=>$name]);
            
            $file = Storage::disk('local')->get('migration_2.sql');
            
            Artisan::call('migrate', array('--force' => true));
//            Artisan::call('migrate:refresh', array('--seed' => true,'--force' => true));
            Artisan::call('migrate:rollback', array('--step' => 1, '--force' => true));
            
            $result = DB::connection($name)->unprepared($file);
            
            session(['selected_database'=>$current_db]);
            return ['success'=>'Schema created'];

        }catch(\Exception $e){
            DB::statement('DROP DATABASE '.$name);
            session(['selected_database'=>$current_db]);
            return ['error'=>$e->getMessage()];
        }
        

    }

    // create initial values on DB
    public function seedDB($name){
        $current_db = session('selected_database');
        try{
            setSessionDBConfig($name);
            session(['selected_database'=>$name]);
            
//            $file = Storage::disk('local')->get('migration_2.sql');
            Artisan::call('db:seed', array('--database'=>$name,'--force' => true,'--class'=>'UniTableUsers'));
//            $result = DB::connection($name)->unprepared($file);
            session(['selected_database'=>$current_db]);
            return ['success'=>'Seeded DB'];
        }catch(\Exception $e){
            session(['selected_database'=>$current_db]);
            return ['error'=>$e->getMessage()];
        }
        

    }

    // Delete DB
    public function deleteDB($name){
        try{
            $result = ($name)?DB::statement('DROP DATABASE IF EXISTS '.$name):false;
            return $result?['success'=>'DB creada']:['error'=>'No name'];
        }catch (\Illuminate\Database\QueryException $e){
            if($e->getCode() =='HY000'){
                return ['error'=>'DB no pudo ser borrada'];
            }else{
               return ['error'=>$e->getCode()]; 
            }
            
        } 
    

    }

    // reset ROOT password
    public function resetRootPassword($name){
        $current_db = session('selected_database');
        
        setSessionDBConfig($name);
        session(['selected_database'=>$name]);
        
        $update = ['password'=>bcrypt('123456')];
        
        $user = User::where('username','root')->get()->first();
        
        
        $res = ['error'=>'No user'];
        
        if($user && $name != 'mescyt_ponche'){
            $user->fill($update)->save();
            $res = ['success'=>$name];
        }
        session(['selected_database'=>$current_db]);
        return $res;

    }
}