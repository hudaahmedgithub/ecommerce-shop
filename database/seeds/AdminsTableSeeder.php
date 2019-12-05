<?php

use App\Models\Admins\Admin;
use App\Models\Products\Category;
use App\Models\Utilities\Country;
use App\Models\Utilities\Currency;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Mohamed Samir',
            'email' => 'gm.mohamedsamir@gmail.com',
            'password' => bcrypt(12345678)
        ]);

        Admin::create([
            'name' => 'Ahmed Ramadan',
            'email' => 'a@a.a',
            'password' => bcrypt('asdasd')
        ]);

        Category::create([
            'active' => 1,
            'name' => 'Pc',
            'description' => 'Pc'
        ]);

        Category::create([
            'active' => 1,
            'name' => 'Clothes',
            'description' => 'Clothes'
        ]);

        Currency::create([
            'name' => 'Pound',
            'active' => 1,
            'code' => 'EGY',
        ]);

        Currency::create([
            'name' => 'Dollar',
            'active' => 1,
            'code' => 'USD',
        ]);

        Country::create([
            'name' => 'Egypt',
            'active' => 1,
            'code' => 'EG',
        ]);

        Country::create([
            'name' => 'Russia',
            'active' => 1,
            'code' => 'RU',
        ]);

    }
}
