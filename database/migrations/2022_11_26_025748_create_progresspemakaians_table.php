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
            $table->string('form_progress_id')->nullable();
            $table->string('item_code')->nullable();
            $table->string('item_name')->nullable();
            $table->string('description')->nullable();
            $table->string('maker')->nullable();
            $table->string('qty')->nullable();
            $table->string('price')->nullable();
            $table->string('total_price')->nullable();
            $table->string('status_part')->nullable();
            $table->string('quotation')->nullable();
            $table->string('nomor_pp')->nullable();
            $table->string('nomor_po')->nullable();
            $table->string('estimasi_kedatangan')->nullable();
            $table->string('status_kedatangan')->nullable();
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
        Schema::drop('progresspemakaians');
    }
}
