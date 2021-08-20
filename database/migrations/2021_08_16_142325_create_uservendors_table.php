<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUservendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uservendors', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->text("email");
            $table->text("password");
            $table->integer("otp_verified")->default(0);
            $table->text("store_name")->nullable();
            $table->text("store_category")->nullable();
            $table->text("store_category_id")->nullable();
            $table->text("country_code")->nullable();
            $table->text("whatsapp")->nullable();
            $table->text("phone")->nullable();
            $table->text("address")->nullable();
            $table->text("logo")->nullable();
            $table->text("featured_image")->nullable();
            $table->text("url")->nullable();
            $table->text("map_lattitude")->nullable();
            $table->text("map_longitude")->nullable();
            $table->integer("shop_in_app")->default(1);
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
        Schema::dropIfExists('uservendors');
    }
}
