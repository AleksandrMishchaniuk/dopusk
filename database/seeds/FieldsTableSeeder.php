<?php

use Illuminate\Database\Seeder;

class FieldsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fields')->delete();
        
        \DB::table('fields')->insert(array (
            0 => 
            array (
                'id' => 1,
                'value' => 'a',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            1 => 
            array (
                'id' => 2,
                'value' => 'b',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            2 => 
            array (
                'id' => 3,
                'value' => 'c',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            3 => 
            array (
                'id' => 4,
                'value' => 'd',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            4 => 
            array (
                'id' => 5,
                'value' => 'e',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            5 => 
            array (
                'id' => 6,
                'value' => 'f',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            6 => 
            array (
                'id' => 7,
                'value' => 'g',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            7 => 
            array (
                'id' => 8,
                'value' => 'h',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            8 => 
            array (
                'id' => 9,
                'value' => 'js',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            9 => 
            array (
                'id' => 10,
                'value' => 'k',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            10 => 
            array (
                'id' => 11,
                'value' => 'm',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            11 => 
            array (
                'id' => 12,
                'value' => 'n',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            12 => 
            array (
                'id' => 13,
                'value' => 'p',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            13 => 
            array (
                'id' => 14,
                'value' => 'r',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            14 => 
            array (
                'id' => 15,
                'value' => 's',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            15 => 
            array (
                'id' => 16,
                'value' => 't',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            16 => 
            array (
                'id' => 17,
                'value' => 'u',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            17 => 
            array (
                'id' => 18,
                'value' => 'v',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            18 => 
            array (
                'id' => 19,
                'value' => 'x',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            19 => 
            array (
                'id' => 20,
                'value' => 'y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
            20 => 
            array (
                'id' => 21,
                'value' => 'z',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
        ));
        
        
    }
}
