<?php

use Illuminate\Database\Seeder;

class BoardTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('board')->delete();
        
        \DB::table('board')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Todo',
                'color' => '#65ccf7',
                'sequence' => 1,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2020-02-13 05:16:54',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Planning',
                'color' => '#827af3',
                'sequence' => 2,
                'status' => 1,
                'created_at' => '2020-02-11 12:10:23',
                'updated_at' => '2020-02-13 05:16:54',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Working',
                'color' => '#3dbb58',
                'sequence' => 3,
                'status' => 1,
                'created_at' => '2020-02-12 03:45:55',
                'updated_at' => '2020-02-13 05:16:54',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Complete',
                'color' => '#fbc647',
                'sequence' => 4,
                'status' => 1,
                'created_at' => '2020-02-12 10:22:30',
                'updated_at' => '2020-02-13 05:16:54',
            ),
        ));
        
        
    }
}