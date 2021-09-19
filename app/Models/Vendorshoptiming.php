<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendorshoptiming extends Model
{
    use HasFactory;

    protected $fillable = ['vendorId','shopDay','shopOpenTime','shopCloseTime','shopTimeStatus'];
}
