<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar', 255);
            $table->string('name_en', 255);
            $table->string('title_ar', 255);
            $table->string('title_en', 255);

            $table->string('sub_title_ar', 255)->nullable();
            $table->string('sub_title_en', 255)->nullable();
            $table->string('description_ar', 255);
            $table->string('description_en', 255);

            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('sliders');
    }
}
