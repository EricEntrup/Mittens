<?php

use Illuminate\Database\Seeder;

class AppointmentTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('appointment')->delete();
        
        \DB::table('appointment')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 2,
                'service_id' => 2,
                'user_id' => 3,
                'price' => 2500.0,
                'name' => NULL,
                'email' => NULL,
                'contact_number' => NULL,
                'date' => '2020-02-08',
                'time' => '17:46:00',
                'created_at' => '2020-02-11 06:07:27',
                'updated_at' => '2020-02-12 08:11:34',
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 1,
                'service_id' => 1,
                'user_id' => NULL,
                'price' => 150.0,
                'name' => 'Nik',
                'email' => 'nil@example.com',
                'contact_number' => '458487456',
                'date' => '2020-03-10',
                'time' => '12:03:00',
                'created_at' => '2020-02-10 12:04:56',
                'updated_at' => '2020-02-12 07:25:06',
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 1,
                'service_id' => 1,
                'user_id' => NULL,
                'price' => 150.0,
                'name' => 'Vicky',
                'email' => 'vicky@example.com',
                'contact_number' => '345345353',
                'date' => '2020-02-13',
                'time' => '02:00:00',
                'created_at' => '2020-02-11 05:25:51',
                'updated_at' => '2020-02-12 07:19:13',
            ),
            3 => 
            array (
                'id' => 4,
                'category_id' => 3,
                'service_id' => 13,
                'user_id' => NULL,
                'price' => 400.0,
                'name' => 'Alex',
                'email' => 'alex@example.com',
                'contact_number' => '6789323122',
                'date' => '2020-02-22',
                'time' => '10:00:00',
                'created_at' => '2020-02-12 08:07:02',
                'updated_at' => '2020-02-12 08:07:02',
            ),
            4 => 
            array (
                'id' => 5,
                'category_id' => 2,
                'service_id' => 7,
                'user_id' => 3,
                'price' => 1500.0,
                'name' => NULL,
                'email' => NULL,
                'contact_number' => NULL,
                'date' => '2020-04-09',
                'time' => '13:30:00',
                'created_at' => '2020-02-12 08:08:31',
                'updated_at' => '2020-02-12 08:08:31',
            ),
            5 => 
            array (
                'id' => 6,
                'category_id' => 3,
                'service_id' => 11,
                'user_id' => NULL,
                'price' => 2000.0,
                'name' => 'Johnny',
                'email' => 'johnny@example.com',
                'contact_number' => '9876543215',
                'date' => '2020-02-03',
                'time' => '07:25:00',
                'created_at' => '2020-02-12 08:06:04',
                'updated_at' => '2020-02-12 08:11:28',
            ),
            6 => 
            array (
                'id' => 7,
                'category_id' => 1,
                'service_id' => 3,
                'user_id' => 3,
                'price' => 200.0,
                'name' => NULL,
                'email' => NULL,
                'contact_number' => NULL,
                'date' => '2020-03-15',
                'time' => '12:30:00',
                'created_at' => '2020-02-12 08:11:23',
                'updated_at' => '2020-02-12 08:11:57',
            ),
            7 => 
            array (
                'id' => 8,
                'category_id' => 1,
                'service_id' => 4,
                'user_id' => 3,
                'price' => 100.0,
                'name' => NULL,
                'email' => NULL,
                'contact_number' => NULL,
                'date' => '2020-02-12',
                'time' => '08:31:00',
                'created_at' => '2020-02-12 08:33:43',
                'updated_at' => '2020-02-12 08:33:43',
            ),
            8 => 
            array (
                'id' => 9,
                'category_id' => 1,
                'service_id' => 3,
                'user_id' => NULL,
                'price' => 200.0,
                'name' => 'Anna',
                'email' => 'anna@example.com',
                'contact_number' => '434345566',
                'date' => '2020-03-26',
                'time' => '08:33:00',
                'created_at' => '2020-02-12 08:34:49',
                'updated_at' => '2020-02-12 08:35:07',
            ),
            9 => 
            array (
                'id' => 10,
                'category_id' => 3,
                'service_id' => 14,
                'user_id' => NULL,
                'price' => 1500.0,
                'name' => 'Carl Price',
                'email' => 'carl@exmple.in',
                'contact_number' => '56789023',
                'date' => '2020-03-01',
                'time' => '08:00:00',
                'created_at' => '2020-02-12 08:55:02',
                'updated_at' => '2020-02-12 08:55:02',
            ),
            10 => 
            array (
                'id' => 11,
                'category_id' => 3,
                'service_id' => 11,
                'user_id' => NULL,
                'price' => 2000.0,
                'name' => 'Mark Lucas',
                'email' => 'marklucas@example.com',
                'contact_number' => '344556672',
                'date' => '2020-03-22',
                'time' => '10:45:00',
                'created_at' => '2020-02-12 08:56:45',
                'updated_at' => '2020-02-12 08:57:27',
            ),
        ));
        
        
    }
}