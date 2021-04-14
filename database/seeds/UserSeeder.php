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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'type'  => 'admin',
            'status' => 'active',
            'password' => Hash::make('admin')
        ]);

        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@gmail.com',   
            'status' => 'active',         
            'password' => Hash::make('user1')
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'status' => 'active',
            'password' => Hash::make('user2')
        ]);
    }
}
