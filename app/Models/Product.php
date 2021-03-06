<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable  = [
        'title', 'sale_price', 'cost', 'quantity',
        'price', 'description', 'image', 'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault();
    }
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'product_tag',
            'product_id',
            'tag_id'
        );
    }
}
