<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendorcoupon extends Model
{
    use HasFactory;

    protected $fillable = ['vendorId','couponName','couponType','couponDiscount','couponMinimumOrder','couponExpired','couponOption','couponStatus'];
}
