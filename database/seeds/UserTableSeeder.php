<?php

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
        $user->name = 'Elia Gutierrez';
        $user->role_id = 1;
        $user->email = 'eliagtzsolis@gmail.com';
        $user->password = bcrypt('system123');
        $user->photo = 'assets/images/user.png';
        $user->email_verified_at = now();
        $user->save();

        factory(App\User::class, 15)->create();


    }
}
