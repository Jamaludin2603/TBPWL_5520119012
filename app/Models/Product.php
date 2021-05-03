<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey ="id";
    protected $fillable = [
        'name',
        'qty',
        'price',
        'brands_id',
        'categories_id',
        'photo',
    ];

    public function brands()
    {
        return $this->belongsTo(Brand::class);
    }
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
