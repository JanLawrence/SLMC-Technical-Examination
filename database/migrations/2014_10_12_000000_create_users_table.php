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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('addressStreet');
            $table->string('addressSuite');
            $table->string('addressCity');
            $table->string('addressZipcode');
            $table->string('addressGeoLat');
            $table->string('addressGeoLng');
            $table->string('phone');
            $table->string('website');
            $table->string('companyName');
            $table->text('companyCatchPhrase');
            $table->string('companyBs');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
