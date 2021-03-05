<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('12345678'),
                'contact_number' => '458487',
                'address' => NULL,
                'user_type' => 'admin',
                'gender' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'created_at' => '2020-02-07 09:55:33',
                'updated_at' => '2020-02-08 11:01:59',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'john',
                'email' => 'john@example.com',
                'password' => bcrypt('12345678'),
                'contact_number' => '45878787877',
                'address' => '',
                'user_type' => 'user',
                'gender' => 'male',
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'created_at' => '2020-02-07 11:11:42',
                'updated_at' => '2020-02-09 05:03:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Emma',
                'email' => 'emma@example.com',
                'password' => bcrypt('12345678'),
                'contact_number' => '45878787878',
                'address' => 'test',
                'user_type' => 'employee',
                'gender' => 'female',
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'created_at' => '2020-02-07 11:31:36',
                'updated_at' => '2020-02-07 11:31:36',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Demo Admin',
                'email' => 'demo@metorik.com',
                'password' => bcrypt('12345678'),
                'contact_number' => '9876543212',
                'address' => 'PO Box 16122 Collins Street West,Victoria 8007 Australia',
                'user_type' => 'demo_admin',
                'gender' => 'male',
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'created_at' => '2020-02-17 11:02:27',
                'updated_at' => '2020-02-17 11:02:27',
            ),
        ));
    }
}