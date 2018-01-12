<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);

        $this->call(FieldsTableSeeder::class);
        $this->call(RangesTableSeeder::class);
        $this->call(QualitiesTableSeeder::class);
        $this->call(TolerancesTableSeeder::class);
    }
}
