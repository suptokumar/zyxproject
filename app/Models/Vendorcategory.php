<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendorcategory extends Model
{
    use HasFactory;

    protected $fillable = ['categoryName', 'categoryIcon', 'vendorType'];
}
