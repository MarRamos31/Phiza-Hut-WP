<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartdetail', function (Blueprint $table) {
            $table->id();
            $table->integer('Qty');
            $table->dateTime('tanggaltransaksi');
            $table->integer('cart_id');
            $table->integer('pizza_id');
            $table->integer('Totalharga');

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
        Schema::dropIfExists('cartdetail');
    }
}
