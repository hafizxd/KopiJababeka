<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->string('Order-Detail-ID');
            $table->string('Order-ID');
            $table->string('Menu-ID');
            $table->tinyInteger('Quantity');
            $table->enum('Sugar-Level', ['Less', 'Normal', 'More'])->nullable();
            $table->enum('Ice-Level', ['Less', 'Normal', 'More'])->nullable();
            $table->timestamps();

            $table->primary('Order-Detail-ID');
            $table->foreign('Order-ID')->references('Order-ID')->on('order_table')->onDelete('cascade');
            $table->foreign('Menu-ID')->references('Menu-ID')->on('menu_table')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
};
