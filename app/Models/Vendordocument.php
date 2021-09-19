<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendordocument extends Model
{
    use HasFactory;

    protected $fillable = ['vendorId','vendorShopFront','vendorShopBack','vendorIncorporationFront','vendorIncorporationBack','vendorCompanyPanFront','vendorCompanyPanBack','vendorOwnerPanFront','vendorOwnerPanBack','vendorOwnerAadharFront','vendorOwnerAadharBack','vendorOtherFront','vendorOtherBack'];
}
