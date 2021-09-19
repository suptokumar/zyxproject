<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendorfaq extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'answer', 'faqStatus'];
}
