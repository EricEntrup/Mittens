<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'role',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => '2020-02-07 10:07:25',
                'updated_at' => '2020-02-07 10:07:25',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'role add',
                'guard_name' => 'web',
                'parent_id' => 1,
                'created_at' => '2020-02-07 10:34:16',
                'updated_at' => '2020-02-07 10:34:16',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'role list',
                'guard_name' => 'web',
                'parent_id' => 1,
                'created_at' => '2020-02-07 10:34:43',
                'updated_at' => '2020-02-07 10:34:43',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'permission',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => '2020-02-07 10:35:40',
                'updated_at' => '2020-02-07 10:35:40',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'permission add',
                'guard_name' => 'web',
                'parent_id' => 4,
                'created_at' => '2020-02-07 10:35:51',
                'updated_at' => '2020-02-07 10:35:51',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'permission list',
                'guard_name' => 'web',
                'parent_id' => 4,
                'created_at' => '2020-02-07 10:36:07',
                'updated_at' => '2020-02-07 10:36:07',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'user',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => '2020-02-07 11:12:06',
                'updated_at' => '2020-02-07 11:12:06',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'user list',
                'guard_name' => 'web',
                'parent_id' => 7,
                'created_at' => '2020-02-07 11:12:21',
                'updated_at' => '2020-02-07 11:12:21',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'user add',
                'guard_name' => 'web',
                'parent_id' => 7,
                'created_at' => '2020-02-07 11:12:32',
                'updated_at' => '2020-02-07 11:12:32',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'user edit',
                'guard_name' => 'web',
                'parent_id' => 7,
                'created_at' => '2020-02-07 11:12:47',
                'updated_at' => '2020-02-07 11:12:47',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'user delete',
                'guard_name' => 'web',
                'parent_id' => 7,
                'created_at' => '2020-02-07 11:13:03',
                'updated_at' => '2020-02-07 11:13:03',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'user view',
                'guard_name' => 'web',
                'parent_id' => 7,
                'created_at' => '2020-02-07 11:13:36',
                'updated_at' => '2020-02-07 11:13:36',
            ),
        ));
        
        
    }
}