<?php

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
        DB::table('users')->insert([
            'user_name' => 'admin',
            'full_name' => 'admin',
            'email' => 'admin@gmail.com',
            'type'  => 'admin',
            'status' => 'active',
            'password' => Hash::make('admin')
        ]);

        DB::table('users')->insert([
            'user_name' => 'user1',
            'full_name' => 'user1',
            'email' => 'user1@gmail.com',   
            'status' => 'active',         
            'password' => Hash::make('user1')
        ]);
        DB::table('users')->insert([
            'user_name' => 'user2',
            'full_name' => 'user2',
            'email' => 'user2@gmail.com',
            'status' => 'active',
            'password' => Hash::make('user2')
        ]);
    }
}
