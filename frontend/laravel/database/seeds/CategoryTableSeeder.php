<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('category')->delete();
        
        \DB::table('category')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Salon',
                'status' => 1,
                'color' => '#0a0c0a',
                'created_at' => '2020-02-12 11:39:22',
                'updated_at' => '2020-02-12 06:17:43',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dental Clinic',
                'status' => 1,
                'color' => '#90acac',
                'created_at' => '2020-02-12 06:17:22',
                'updated_at' => '2020-02-12 06:21:54',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Cleaning',
                'status' => 1,
                'color' => '#00d0ff',
                'created_at' => '2020-02-12 06:48:51',
                'updated_at' => '2020-02-12 06:48:51',
            ),
        ));
        
        
    }
}