<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgressrepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progressrepairs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('form_input_id');
            $table->string('place_of_repair');
            $table->text('analisa');
            $table->text('action');
            $table->integer('pic_repair');
            $table->dateTime('plan_start_repair');
            $table->dateTime('plan_finish_repair');
            $table->dateTime('actual_start_repair');
            $table->dateTime('actual_finish_repair');
            $table->float('total_time_repair');
            $table->integer('labour_cost');
            $table->string('judgement');
            $table->integer('subcont_name');
            $table->string('quotation');
            $table->string('nomor_pp');
            $table->string('nomor_po');
            $table->dateTime('estimasi_selesai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('progressrepairs');
    }
}
