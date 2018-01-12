<?php

use Illuminate\Database\Seeder;

class QualitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('qualities')->delete();
        
        \DB::table('qualities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'value' => '01',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            1 => 
            array (
                'id' => 2,
                'value' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            2 => 
            array (
                'id' => 4,
                'value' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            3 => 
            array (
                'id' => 5,
                'value' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            4 => 
            array (
                'id' => 6,
                'value' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            5 => 
            array (
                'id' => 7,
                'value' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            6 => 
            array (
                'id' => 8,
                'value' => '5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            7 => 
            array (
                'id' => 9,
                'value' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            8 => 
            array (
                'id' => 10,
                'value' => '7',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            9 => 
            array (
                'id' => 11,
                'value' => '8',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            10 => 
            array (
                'id' => 12,
                'value' => '9',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            11 => 
            array (
                'id' => 13,
                'value' => '10',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            12 => 
            array (
                'id' => 14,
                'value' => '11',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            13 => 
            array (
                'id' => 15,
                'value' => '12',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            14 => 
            array (
                'id' => 16,
                'value' => '13',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            15 => 
            array (
                'id' => 17,
                'value' => '14',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            16 => 
            array (
                'id' => 18,
                'value' => '15',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            17 => 
            array (
                'id' => 19,
                'value' => '16',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            18 => 
            array (
                'id' => 20,
                'value' => '17',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            19 => 
            array (
                'id' => 21,
                'value' => '18',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
        ));
        
        
    }
}
