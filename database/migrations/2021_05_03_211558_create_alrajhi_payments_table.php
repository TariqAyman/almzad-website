<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlrajhiPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alrajhi_payments', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->string('email');
            $table->json('data')->nullable();
            $table->json('data_encrypted')->nullable();
            $table->json('request_data')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->json('response_init')->nullable();
            $table->json('response_callback')->nullable();
            $table->longText('response_callback_encrypted')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('payment_iframe_url')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('alrajhi_payments');
    }
}
