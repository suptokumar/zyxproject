<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
		'vendorName', 'vendorEmail', 'vendorCountryCode', 'vendorContactNumber', 'password', 'vendorOtp', 'isOtpVerify', 'isOtpResend', 'storeName', 'gstNumber', 'storeWebLogo', 'storeAppLogo', 'storeCounty', 'storeCity', 'storeAddress', 'storeLatitude', 'storeLongitude', 'vendorToken', 'vendorStatus', 'vendorDomainUrl', 'printSetting', 'printReceiptWidth', 'printReceiptHeight', 'isPreOrder'
	];
  
  	/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'password',
      'remember_token',
  	];
}
