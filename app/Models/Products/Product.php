<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected  $table = 'products';
    protected $fillable = [
        'image', 'place', 'province' , 'description'
    ];
}
