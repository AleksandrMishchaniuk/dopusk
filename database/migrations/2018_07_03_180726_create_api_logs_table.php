<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('method', 10);
            $table->string('endpoint');
            $table->json('query_params')->nullable();
            $table->json('post_params')->nullable();
            $table->text('request_content')->nullable();
            $table->json('request_headers');
            $table->json('ips');
            $table->string('token')->nullable();
            $table->string('response_code', 3);
            $table->text('response_body');
            $table->json('response_params')->nullable();
            $table->json('response_headers');
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
        Schema::dropIfExists('api_logs');
    }
}
