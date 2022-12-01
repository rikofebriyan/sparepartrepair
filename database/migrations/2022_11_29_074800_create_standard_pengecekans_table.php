<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandardPengecekansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standard_pengecekans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('master_spare_part_id');
            $table->integer('item_standard_id');
            $table->string('standard_pengecekan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('standard_pengecekans');
    }
}
