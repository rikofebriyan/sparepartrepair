<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinishrepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finishrepairs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('form_trial_id')->nullable();
            $table->string('judgement')->nullable();
            $table->string('no_code_repair')->nullable();
            $table->string('delivery_date')->nullable();
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
        Schema::drop('finishrepairs');
    }
}
