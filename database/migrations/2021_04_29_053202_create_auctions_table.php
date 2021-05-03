<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name_ar', 255);
            $table->string('name_en', 255);
            $table->string('description_ar', 255)->nullable();
            $table->string('description_en', 255)->nullable();
            $table->string('conditions_ar', 255)->nullable();
            $table->string('conditions_en', 255)->nullable();
            $table->string('shipping_conditions_ar', 255)->nullable();
            $table->string('shipping_conditions_en', 255)->nullable();
            $table->string('slug_ar', 255);
            $table->string('slug_en', 255);
            $table->boolean('status')->default(0);
            $table->double('start_from');
            $table->double('purchase_price')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('shipping')->default(0);
            $table->boolean('shipping_free')->default(0);
            $table->boolean('multi_auction')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('auctions');
    }
}
