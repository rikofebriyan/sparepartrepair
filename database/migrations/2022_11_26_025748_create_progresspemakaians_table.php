<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgresspemakaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progresspemakaians', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('form_input_id');
            $table->integer('item_code');
            $table->string('item_name');
            $table->string('description');
            $table->integer('maker');
            $table->integer('qty');
            $table->integer('price');
            $table->string('total_price');
            $table->string('status_part');
            $table->string('quotation');
            $table->string('nomor_pp');
            $table->string('nomor_po');
            $table->dateTime('estimasi_kedatangan');
            $table->string('status_kedatangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('progresspemakaians');
    }
}
