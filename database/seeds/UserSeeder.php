<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([            
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone_number' => '0123456789',
            'password' => bcrypt('123456'),
            'role_id' => 1,
        ]);
    }
}
