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
            $table->dateTime('date');
            $table->string('part_from');
            $table->string('code_part_repair');
            $table->string('reg_sp');
            $table->integer('section');
            $table->integer('line');
            $table->integer('machine');
            $table->integer('item_code');
            $table->string('item_name');
            $table->string('item_type');
            $table->integer('maker');
            $table->string('serial_number');
            $table->text('problem');
            $table->string('nama_pic');
            $table->string('type_of_part');
            $table->string('price');
            $table->string('stock_spare_part');
            $table->string('status_repair');
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
