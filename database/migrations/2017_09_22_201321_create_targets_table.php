<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('targets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('repository_id');
            $table->string('name');
            $table->string('host');
            $table->string('url');
            $table->string('db_name');
            $table->string('db_host');
            $table->string('db_user');
            $table->string('db_pass');
            $table->string('subdirectory')->nullable();
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
        Schema::dropIfExists('targets');
    }
}
