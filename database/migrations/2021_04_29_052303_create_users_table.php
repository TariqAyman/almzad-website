<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username');
            $table->string('email');
            $table->string('phone_number');
            $table->string('type')->default('user');
            $table->string('profile_photo')->nullable();
            $table->text('address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status')->default(0);
            $table->boolean('phone_verified')->default(0);
            $table->timestamp('phone_verified_at')->nullable();
            $table->text('sessionInfo')->nullable();
            $table->dateTime('sessionInfoTime')->nullable();
            $table->text('recaptchaToken')->nullable();
            $table->dateTime('recaptchaTokenTime')->nullable();
            $table->longText('firebaseIdToken')->nullable();
            $table->longText('refreshToken')->nullable();
            $table->longText('expiresIn')->nullable();
            $table->longText('localId')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
