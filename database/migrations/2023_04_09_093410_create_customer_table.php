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
        Schema::create('customer_table', function (Blueprint $table) {
            $table->string('Customer-ID');
            $table->string('Customer-Name');
            $table->string('Customer-Address')->nullable();
            $table->string('Customer-Phone')->nullable();
            $table->timestamps();
            
            $table->primary('Customer-ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_table');
    }
};
