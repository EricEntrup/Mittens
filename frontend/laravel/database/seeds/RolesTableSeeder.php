<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'user',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2020-02-07 09:56:49',
                'updated_at' => '2020-02-09 11:45:47',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'employee',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2020-02-07 10:37:11',
                'updated_at' => '2020-02-09 11:10:54',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'demo_admin',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2020-02-17 10:58:26',
                'updated_at' => '2020-02-17 10:58:26',
            ),
        ));
        
        
    }
}