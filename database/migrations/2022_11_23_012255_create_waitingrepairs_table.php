<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaitingrepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waitingrepairs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('date')->nullable();
            $table->string('part_from')->nullable();
            $table->string('code_part_repair')->nullable();
            $table->string('number_of_repair')->nullable();
            $table->string('reg_sp')->nullable();
            $table->integer('section')->nullable();
            $table->integer('line')->nullable();
            $table->integer('machine')->nullable();
            $table->integer('item_code')->nullable();
            $table->string('item_name')->nullable();
            $table->string('item_type')->nullable();
            $table->integer('maker')->nullable();
            $table->string('serial_number')->nullable();
            $table->text('problem')->nullable();
            $table->string('nama_pic')->nullable();
            $table->string('type_of_part')->nullable();
            $table->string('price')->nullable();
            $table->string('stock_spare_part')->nullable();
            $table->string('status_repair')->nullable();
            $table->string('progress')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('waitingrepairs');
    }
}
