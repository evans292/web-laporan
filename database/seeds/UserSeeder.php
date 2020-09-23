<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = User::create([
            'name' => 'Euis Khoirunnisa',
            'email' => 'euiskhoirun@gmail.com',
            'password' => bcrypt('03062002'),
        ]);

        $admin->assignRole('admin');
    }
}
