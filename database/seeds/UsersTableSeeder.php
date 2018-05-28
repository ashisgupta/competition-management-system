<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            ['first_name' => "Sawankumar",
            'last_name' => "Naik",
            'email' => 'naiksa1@gmail.com',
            'password' => bcrypt('demopassword'),
            'status' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'role_id' => 1],
            ['first_name' => "Student",
            'last_name' => "Account",
            'email' => 'student@gmail.com',
            'password' => bcrypt('demopassword'),
            'status' => '0',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'role_id' => 4],
            ['first_name' => "Student1",
            'last_name' => "Account",
            'email' => 'student1@gmail.com',
            'password' => bcrypt('demopassword'),
            'status' => '0',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'role_id' => 4],
            ['first_name' => "Student2",
            'last_name' => "Account",
            'email' => 'student2@gmail.com',
            'password' => bcrypt('demopassword'),
            'status' => '0',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'role_id' => 4],
            ['first_name' => "Judge",
            'last_name' => "Account",
            'email' => 'judge@gmail.com',
            'status' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'password' => bcrypt('demopassword'),
            'role_id' => 2],
            ['first_name' => "Judge1",
            'last_name' => "Account",
            'email' => 'judge1@gmail.com',
            'status' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'password' => bcrypt('demopassword'),
            'role_id' => 2],
            ['first_name' => "Judge2",
            'last_name' => "Account",
            'email' => 'judge2@gmail.com',
            'status' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'password' => bcrypt('demopassword'),
            'role_id' => 2],
        ]);
    }
}
