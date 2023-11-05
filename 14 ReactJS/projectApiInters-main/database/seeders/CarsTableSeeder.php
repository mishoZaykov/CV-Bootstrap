<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cars')->delete();
        
        \DB::table('cars')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'brand' => 'BMW',
                'model' => 'GT',
                'year' => 2015,
                'created_at' => '2023-10-27 07:52:37',
                'updated_at' => '2023-10-27 07:52:37',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'brand' => 'Renault',
                'model' => 'Megan',
                'year' => 2015,
                'created_at' => '2023-10-27 07:52:47',
                'updated_at' => '2023-10-27 07:52:47',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 2,
                'brand' => 'Peugeot',
                'model' => '205',
                'year' => 2015,
                'created_at' => '2023-10-27 07:52:49',
                'updated_at' => '2023-10-27 07:52:49',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 2,
                'brand' => 'BMW',
                'model' => '200',
                'year' => 2015,
                'created_at' => '2023-10-27 07:52:50',
                'updated_at' => '2023-10-27 07:52:50',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 2,
                'brand' => 'BMW',
                'model' => '2004',
                'year' => 2015,
                'created_at' => '2023-10-27 07:52:50',
                'updated_at' => '2023-10-27 07:52:50',
            ),
            5 => 
            array (
                'id' => 12,
                'user_id' => 2,
                'brand' => 'Mercedes',
                'model' => 'AMG',
                'year' => 2020,
                'created_at' => '2023-11-01 08:56:03',
                'updated_at' => '2023-11-01 08:56:03',
            ),
            6 => 
            array (
                'id' => 13,
                'user_id' => 2,
                'brand' => 'Mercedes',
                'model' => 'AMG',
                'year' => 2020,
                'created_at' => '2023-11-01 09:00:03',
                'updated_at' => '2023-11-01 09:00:03',
            ),
        ));
        
        
    }
}