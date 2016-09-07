<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTolerancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tolerances', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('max_val', 10, 2);
            $table->decimal('min_val', 10, 2);
            $table->enum('system', ['hole', 'shaft']);
            $table->integer('range_id')->unsigned();
            $table->foreign('range_id')->references('id')->on('ranges');
            $table->integer('quality_id')->unsigned();
            $table->foreign('quality_id')->references('id')->on('qualities');
            $table->integer('field_id')->unsigned();
            $table->foreign('field_id')->references('id')->on('fields');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tolerances');
    }
}
