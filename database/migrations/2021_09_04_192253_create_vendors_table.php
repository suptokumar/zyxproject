<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('vendorName','100')->default('');
            $table->string('vendorEmail','50')->default('');
            $table->string('vendorCountryCode','15')->default('');
            $table->string('vendorContactNumber','15')->index('vendorContactNumber')->default('');
            $table->string('password','255')->default('');
            $table->string('vendorOtp','4')->default('');
            $table->tinyInteger('isOtpVerify')->index('isOtpVerify')->default(0)->comment('1=Yes, 0=No');
            $table->tinyInteger('isOtpResend')->default(0)->comment('1=Yes, 0=No');
            $table->string('storeName','255')->default('');
            $table->string('gstNumber','50')->default('');
            $table->string('storeWebLogo','100')->default('');
            $table->string('storeAppLogo','100')->default('');
            $table->string('storeCounty','100')->default('');
            $table->string('storeCity','100')->default('');
            $table->string('storeAddress','100')->default('');
            $table->string('storeLatitude','100')->default('');
            $table->string('storeLongitude','100')->default('');
            $table->string('vendorDomainUrl','100')->default('');
          	$table->string('printSetting','255')->default('');
            $table->string('printReceiptWidth','15')->default('');
            $table->string('printReceiptHeight','15')->default('');
          	$table->tinyInteger('isPreOrder')->index('isPreOrder')->default(0)->comment('1=Yes, 0=No');
            $table->string('vendorToken','50')->default('');
            $table->tinyInteger('vendorStatus')->index('vendorStatus')->default(1)->comment('1=Active, 0=Deactive');
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
        Schema::dropIfExists('vendors');
    }
}
