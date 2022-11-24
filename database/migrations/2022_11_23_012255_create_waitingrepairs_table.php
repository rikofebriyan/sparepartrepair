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
            $table->string('nama_pic')->nullable();
            $table->string('reg_sp')->nullable();
            $table->string('section')->nullable();
            $table->string('line')->nullable();
            $table->string('machine')->nullable();
            $table->string('item_code')->nullable();
            $table->string('item_name')->nullable();
            $table->string('item_type')->nullable();
            $table->string('maker')->nullable();
            $table->string('serial_number')->nullable();
            $table->text('problem')->nullable();
            $table->string('type_of_part')->nullable();
            $table->string('price')->nullable();
            $table->string('stock_spare_part')->nullable();
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
        Schema::drop('waitingrepairs');
    }
}
