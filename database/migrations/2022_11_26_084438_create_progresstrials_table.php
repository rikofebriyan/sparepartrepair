<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgresstrialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progresstrials', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('form_input_id')->nullable();
            $table->integer('id_standard_pengecekan')->nullable();
            $table->string('operation')->nullable();
            $table->string('standard_pengecekan_min')->nullable();
            $table->string('standard_pengecekan_max')->nullable();
            $table->string('unit_measurement')->nullable();
            $table->string('actual_pengecekan')->nullable();
            $table->string('judgement')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('progresstrials');
    }
}
