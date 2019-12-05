<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'super',
           
            'email' => 'super_admin@app.com',
            'password' => bcrypt('123456'),
        ]);

        $user->attachRole('super_admin');

    }//end of run

}//end of seeder
