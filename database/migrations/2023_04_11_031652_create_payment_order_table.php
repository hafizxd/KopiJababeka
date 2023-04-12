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
        Schema::create('payment_order', function (Blueprint $table) {
            $table->string('Payment-ID');
            $table->string('Order-ID');
            $table->string('Customer-ID');
            $table->string('User-ID');
            $table->string('Cash-Payment')->nullable();
            $table->string('Debit-Card')->nullable();
            $table->enum('ShopeePay-OVO', ['ShopeePay', 'OVO'])->nullable();
            $table->timestamps();

            $table->primary('Payment-ID');
            $table->foreign('Order-ID')->references('Order-ID')->on('order_table')->onDelete('cascade');
            $table->foreign('Customer-ID')->references('Customer-ID')->on('customer_table')->onDelete('cascade');
            $table->foreign('User-ID')->references('User-ID')->on('user_table')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_order');
    }
};
