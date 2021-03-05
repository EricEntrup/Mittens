<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('service')->delete();
        
        \DB::table('service')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Boy Hair Cut',
                'label' => NULL,
                'category_id' => 1,
                'status' => 1,
                'price' => 150.0,
                'created_at' => '2020-02-10 12:00:23',
                'updated_at' => '2020-02-12 06:27:17',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Orthodontics',
                'label' => NULL,
                'category_id' => 2,
                'status' => 1,
                'price' => 2500.0,
                'created_at' => '2020-02-10 12:00:38',
                'updated_at' => '2020-02-12 06:22:20',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Girl Hair Cut',
                'label' => NULL,
                'category_id' => 1,
                'status' => 1,
                'price' => 200.0,
                'created_at' => '2020-02-12 06:26:28',
                'updated_at' => '2020-02-12 06:26:28',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Beard trim',
                'label' => NULL,
                'category_id' => 1,
                'status' => 1,
                'price' => 100.0,
                'created_at' => '2020-02-12 06:26:58',
                'updated_at' => '2020-02-12 06:26:58',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Teeth cleaning and Polishing',
                'label' => NULL,
                'category_id' => 2,
                'status' => 1,
                'price' => 999.0,
                'created_at' => '2020-02-12 06:29:14',
                'updated_at' => '2020-02-12 06:29:14',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Tooth Extraction',
                'label' => NULL,
                'category_id' => 2,
                'status' => 1,
                'price' => 1500.0,
                'created_at' => '2020-02-12 06:30:13',
                'updated_at' => '2020-02-12 06:30:13',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Root canal treatment - front teeth',
                'label' => NULL,
                'category_id' => 2,
                'status' => 1,
                'price' => 1500.0,
                'created_at' => '2020-02-12 06:32:30',
                'updated_at' => '2020-02-12 06:33:12',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Root canal treatment - back teeth',
                'label' => NULL,
                'category_id' => 2,
                'status' => 1,
                'price' => 2000.0,
                'created_at' => '2020-02-12 06:32:55',
                'updated_at' => '2020-02-12 06:32:55',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Tooth Extraction - Regular',
                'label' => NULL,
                'category_id' => 2,
                'status' => 1,
                'price' => 550.0,
                'created_at' => '2020-02-12 06:34:33',
                'updated_at' => '2020-02-12 06:34:33',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Curtains',
                'label' => NULL,
                'category_id' => 3,
                'status' => 1,
                'price' => 120.0,
                'created_at' => '2020-02-12 06:58:47',
                'updated_at' => '2020-02-12 06:58:47',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Leather Sofa',
                'label' => NULL,
                'category_id' => 3,
                'status' => 1,
                'price' => 2000.0,
                'created_at' => '2020-02-12 07:26:09',
                'updated_at' => '2020-02-12 07:26:09',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Carpet Shampooing',
                'label' => NULL,
                'category_id' => 3,
                'status' => 1,
                'price' => 750.0,
                'created_at' => '2020-02-12 07:26:43',
                'updated_at' => '2020-02-12 07:26:43',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Mattress Shampooing',
                'label' => NULL,
                'category_id' => 3,
                'status' => 1,
                'price' => 400.0,
                'created_at' => '2020-02-12 07:27:17',
                'updated_at' => '2020-02-12 07:27:17',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Kichen , Bathrooms',
                'label' => NULL,
                'category_id' => 3,
                'status' => 1,
                'price' => 1500.0,
                'created_at' => '2020-02-12 08:53:57',
                'updated_at' => '2020-02-12 08:53:57',
            ),
        ));
        
        
    }
}