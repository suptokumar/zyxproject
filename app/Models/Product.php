<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['vendorId','categoryId','subCategoryId','productName','productPrice','DiscountedProductPrice','productUnit','productShortDescription','productLongDescription','productSpecification','productIsInStock','productStock','productFeaturedImage','productStatus'];
}
