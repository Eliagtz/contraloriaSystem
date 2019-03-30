<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $role_admin = Role::where('description', 'Administrator')->first();
        $user->name = 'Elia Gutierrez';
        $user->email = 'eliagtzsolis@gmail.com';
        $user->password = bcrypt('system123');
        $user->photo = 'assets/images/user.png';
        $user->save();
        $user->roles()->attach($role_admin);

    }
}
