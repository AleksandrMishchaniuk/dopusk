<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTolerancesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE VIEW tolerances_view AS 
            SELECT t.*, r.max_val AS max_size, r.min_val AS min_size, q.value AS quality, f.value AS field
            FROM tolerances AS t  
            LEFT JOIN ranges AS r ON t.range_id = r.id 
            LEFT JOIN fields AS f ON t.field_id = f.id 
            LEFT JOIN qualities AS q ON t.quality_id = q.id"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW tolerances_view');
    }
}
