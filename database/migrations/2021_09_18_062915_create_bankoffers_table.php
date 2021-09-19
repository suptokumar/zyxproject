<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankoffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankoffers', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->text("type");
            $table->text("value");
            $table->text("description");
            $table->text("icon");
            $table->text("test");
            $table->text("min_amount");
            $table->text("vendors");
            $table->text("gateway");
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
        Schema::dropIfExists('bankoffers');
    }
}
