<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendorfeatureimage extends Model
{
    use HasFactory;

    protected $fillable = ['vendorId', 'featureImage'];
}
