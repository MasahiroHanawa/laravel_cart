<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'category_id', 'stock', 'price',
        'sale_price', 'image_1', 'image_2', 'image_3', 'image_4',
        'image_5'
    ];

}
