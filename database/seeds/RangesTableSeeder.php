<?php

use Illuminate\Database\Seeder;

class RangesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ranges')->delete();
        
        \DB::table('ranges')->insert(array (
            0 => 
            array (
                'id' => 1,
                'min_val' => 1,
                'max_val' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            1 => 
            array (
                'id' => 2,
                'min_val' => 3,
                'max_val' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            2 => 
            array (
                'id' => 3,
                'min_val' => 6,
                'max_val' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            3 => 
            array (
                'id' => 4,
                'min_val' => 10,
                'max_val' => 14,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            4 => 
            array (
                'id' => 5,
                'min_val' => 14,
                'max_val' => 18,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            5 => 
            array (
                'id' => 6,
                'min_val' => 18,
                'max_val' => 24,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            6 => 
            array (
                'id' => 7,
                'min_val' => 24,
                'max_val' => 30,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            7 => 
            array (
                'id' => 8,
                'min_val' => 30,
                'max_val' => 40,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            8 => 
            array (
                'id' => 9,
                'min_val' => 40,
                'max_val' => 50,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            9 => 
            array (
                'id' => 10,
                'min_val' => 50,
                'max_val' => 65,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            10 => 
            array (
                'id' => 11,
                'min_val' => 65,
                'max_val' => 80,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            11 => 
            array (
                'id' => 12,
                'min_val' => 80,
                'max_val' => 100,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            12 => 
            array (
                'id' => 13,
                'min_val' => 100,
                'max_val' => 120,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            13 => 
            array (
                'id' => 14,
                'min_val' => 120,
                'max_val' => 140,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            14 => 
            array (
                'id' => 15,
                'min_val' => 140,
                'max_val' => 160,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            15 => 
            array (
                'id' => 16,
                'min_val' => 160,
                'max_val' => 180,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            16 => 
            array (
                'id' => 17,
                'min_val' => 180,
                'max_val' => 200,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            17 => 
            array (
                'id' => 18,
                'min_val' => 200,
                'max_val' => 225,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            18 => 
            array (
                'id' => 19,
                'min_val' => 225,
                'max_val' => 250,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            19 => 
            array (
                'id' => 20,
                'min_val' => 250,
                'max_val' => 280,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            20 => 
            array (
                'id' => 21,
                'min_val' => 280,
                'max_val' => 315,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            21 => 
            array (
                'id' => 22,
                'min_val' => 315,
                'max_val' => 355,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            22 => 
            array (
                'id' => 23,
                'min_val' => 355,
                'max_val' => 400,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            23 => 
            array (
                'id' => 24,
                'min_val' => 400,
                'max_val' => 450,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            24 => 
            array (
                'id' => 25,
                'min_val' => 450,
                'max_val' => 500,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
        ));
        
        
    }
}
