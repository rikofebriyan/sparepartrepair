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
            $table->string('form_progress_id')->nullable();
            $table->string('id_standard_pengecekan')->nullable();
            $table->string('standard_pengecekan')->nullable();
            $table->string('actual_pengecekan')->nullable();
            $table->string('judgement')->nullable();
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
        Schema::drop('progresstrials');
    }
}
