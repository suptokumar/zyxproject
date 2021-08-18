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
            $table->text("store_name")->default("");
            $table->text("store_category")->default("");
            $table->text("store_category_id")->default("");
            $table->text("country_code")->default("");
            $table->text("whatsapp")->default("");
            $table->text("phone")->default("");
            $table->text("address")->default("");
            $table->text("logo")->default("");
            $table->text("featured_image")->default("");
            $table->text("url")->default("");
            $table->text("map_lattitude")->default("");
            $table->text("map_longitude")->default("");
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
