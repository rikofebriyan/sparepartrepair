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
            $table->foreign('master_spare_part_id');
            $table->foreign('item_standard_id');
            $table->string('string');
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
