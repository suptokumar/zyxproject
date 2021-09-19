<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appusers', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->text("phone");
            $table->text("email");
            $table->text("password");
            $table->text("otp_verified");
            $table->text("map_longitude");
            $table->text("map_lattitude");
            $table->text("address");
            $table->text("profile");
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
        Schema::dropIfExists('appusers');
    }
}
