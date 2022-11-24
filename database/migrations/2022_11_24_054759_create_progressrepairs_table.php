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
            $table->string('form_input_id')->nullable();
            $table->string('place_of_repair')->nullable();
            $table->string('analisa')->nullable();
            $table->string('action')->nullable();
            $table->string('pic_repair')->nullable();
            $table->string('plan_start_repair')->nullable();
            $table->string('plan_finish_repair')->nullable();
            $table->string('actual_start_repair')->nullable();
            $table->string('actual_finish_repair')->nullable();
            $table->string('total_time_repair')->nullable();
            $table->text('labour_cost')->nullable();
            $table->string('judgement')->nullable();
            $table->string('subcont_name')->nullable();
            $table->string('quotation')->nullable();
            $table->string('nomor_pp')->nullable();
            $table->string('nomor_po')->nullable();
            $table->string('estimasi_selesai')->nullable();
            $table->string('status_repair')->nullable();
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
        Schema::drop('progressrepairs');
    }
}
