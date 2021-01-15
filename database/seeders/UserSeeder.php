<?php

namespace Database\Seeders;

use App\Models\User;

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
        User::create([
    		'name' => 'Admin',
    		'email' => 'admin@admin.com',
    		'password' => 'admin123',
            'role' => 'admin',
    		'photo' => 'default.jpg'
    	]);
        
        User::create([
    		'name' => 'Kasir',
    		'email' => 'kasir@kasir.com',
    		'password' => 'kasir123',
            'role' => 'kasir',
    		'photo' => 'default.jpg'
    	]);
    }
}
