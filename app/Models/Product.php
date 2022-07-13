<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'amount', 'description', 'thumbnail', 'price', 'category_id', 'discount', 'expired_date', 'discount_code'];
}
