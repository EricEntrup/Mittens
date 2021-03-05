<?php

use Illuminate\Database\Seeder;

class BoardTaskTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('board_task')->delete();
        
        \DB::table('board_task')->insert(array (
            0 => 
            array (
                'id' => 1,
                'board_id' => 1,
                'name' => 'Contact with john',
                'description' => 'Contact with jones for new project',
                'priority' => '2',
                'date' => '2020-02-13',
                'created_at' => '2020-02-11 11:25:31',
                'updated_at' => '2020-02-13 05:23:10',
            ),
            1 => 
            array (
                'id' => 2,
                'board_id' => 2,
                'name' => 'Presentations',
                'description' => 'New project\'s presentations',
                'priority' => '2',
                'date' => '2020-02-13',
                'created_at' => '2020-02-11 12:10:48',
                'updated_at' => '2020-02-13 05:23:08',
            ),
            2 => 
            array (
                'id' => 3,
                'board_id' => 1,
                'name' => 'Assign Project',
                'description' => 'Assign new  project to Emma',
                'priority' => '3',
                'date' => '2020-02-19',
                'created_at' => '2020-02-12 04:02:18',
                'updated_at' => '2020-02-13 05:23:00',
            ),
            3 => 
            array (
                'id' => 4,
                'board_id' => 2,
                'name' => 'Meeting',
                'description' => 'Discuss point of new project',
                'priority' => '1',
                'date' => '2020-02-26',
                'created_at' => '2020-02-12 05:33:24',
                'updated_at' => '2020-02-12 12:44:55',
            ),
            4 => 
            array (
                'id' => 5,
                'board_id' => 3,
                'name' => 'Product Campaign',
                'description' => 'Marketing Strategy , Planning , Discussion',
                'priority' => '3',
                'date' => '2020-02-12',
                'created_at' => '2020-02-12 10:18:29',
                'updated_at' => '2020-02-12 10:21:10',
            ),
            5 => 
            array (
                'id' => 6,
                'board_id' => 4,
                'name' => 'Meeting',
                'description' => 'Meeting with Mr Alex about new project',
                'priority' => '1',
                'date' => '2020-02-13',
                'created_at' => '2020-02-12 10:27:31',
                'updated_at' => '2020-02-12 12:45:01',
            ),
        ));
        
        
    }
}