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
        Schema::create('menu_table', function (Blueprint $table) {
            $table->string('Menu-ID');
            $table->string('Product-Name');
            $table->enum('Product-Type', ['Drink', 'Snack', 'Food']);
            $table->integer('Product-Price');
            $table->timestamps();

            $table->primary('Menu-ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
};
