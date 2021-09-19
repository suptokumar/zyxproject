<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendortax extends Model
{
    use HasFactory;

    protected $fillable = ['vendorId', 'taxName', 'taxPercentage', 'taxStatus'];
}
