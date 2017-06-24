<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Role;
use App\Permission;

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
    	$faker = Faker::create();
    	foreach (range(1,10) as $index) {
            User::create([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'username'=> $faker->userName,
	            'email' => $faker->email,
	            'password' => bcrypt('secret'),
                'id_fingerprint'=> $faker->numberBetween(10000,20000)
            ]);
            
        }
        
        $this->call(UniTableUsers::class);
        
        $user = User::where('username','root')->get()->first();
         
        $root = new Role();
        $root->name         = 'root';
        $root->display_name = 'User Administrator'; // optional
        $root->description  = 'Mescyt Admin User'; // optional
        $root->save();
            
        
        $create = Permission::where('name','create')->get()->first();
        $edit = Permission::where('name','edit')->get()->first();
        $consult = Permission::where('name','consult')->get()->first();
        $delete = Permission::where('name','delete')->get()->first();
        $retake = Permission::where('name','retake')->get()->first();
         
        $root->attachPermissions(array($create, $edit,$consult,$delete,$retake));
         
        $user->detachRoles($user->roles);
        $user->attachRole($root);
    }
}
