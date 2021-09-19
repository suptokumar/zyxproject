<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendorbankdetail extends Model
{
    use HasFactory;

    protected $fillable = ['vendorId', 'accountHolderName', 'accountNumber', 'ifscCode', 'bankName', 'city', 'cancelledCheckPhoto', 'bankStatus'];
}
