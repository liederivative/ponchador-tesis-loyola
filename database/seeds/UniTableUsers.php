<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Role;
use App\Permission;


class UniTableUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        //User : ROOT
        $user = User::create([
                'firstname' => 'Groot',
                'lastname' => 'Gradian',
                'username'=> 'root',
	            'email' => 'root@root.com',
	            'password' => bcrypt('123456')
            ]);

        // Role : USER
        $owner = new Role();
        $owner->name         = 'user';
        $owner->display_name = 'Rol Consulta '; // optional
        $owner->description  = 'Rol para consultar en general'; // optional
        $owner->save();
        
         // Role : EDITOR
        $editor = new Role();
        $editor->name         = 'editor';
        $editor->display_name = 'Rol Universiad Edición'; // optional
        $editor->description  = 'Rol para editar y consultar '; // optional
        $editor->save();
         
         // Role : ADMIN
        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'Usuario Universiad Admin'; // optional
        $admin->description  = 'Usuario con privilegios para editar usuarios universidad'; // optional
        $admin->save();

        
            
        
        // role attach alias
        // USER:ROOT IS ROLE:ADMIN
        $user->attachRole($admin); // parameter can be an Role object, array, or id
         
        // PERM: CREATE
        $create = new Permission();
        $create->name         = 'create';
        $create->display_name = 'Crear en general'; // optional
        // Allow a user to...
        $create->description  = 'Crea entradas'; // optional
        $create->save();
         
        // PERM: EDIT
        $edit = new Permission();
        $edit->name         = 'edit';
        $edit->display_name = 'Edita en general'; // optional
        // Allow a user to...
        $edit->description  = 'Edita entradas'; // optional
        $edit->save();
         
        // PERM: CONSULT
        $consult = new Permission();
        $consult->name         = 'consult';
        $consult->display_name = 'Consulta en general'; // optional
        // Allow a user to...
        $consult->description  = 'Consulta entradas'; // optional
        $consult->save();

        // PERM: DELETE
        $delete = new Permission();
        $delete->name         = 'delete';
        $delete->display_name = 'Borrar en general'; // optional
        // Allow a user to...
        $delete->description  = 'Borrar entradas'; // optional
        $delete->save();
         
         // PERM: RETAKE
        $retake = new Permission();
        $retake->name         = 'retake';
        $retake->display_name = 'Reposición en general'; // optional
        // Allow a user to...
        $retake->description  = 'Repone entradas'; // optional
        $retake->save();
        
        //ROLE:EDITOR HAS PERM:CONSULT,DELETE,EDIT,CREATE
        $editor->attachPermissions(array($delete, $edit,$consult,$create));
         
         //ROLE:USER HAS PERM:CONSULT
        $owner->attachPermission($consult);
         
        //ROLE:ADMIN HAS PERM:CONSULT,DELETE,EDIT,CREATE,RETAKE
        $admin->attachPermissions(array($delete, $edit,$consult,$create,$retake));
        
    }
}
