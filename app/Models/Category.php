<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    use HasFactory;
    protected $primaryKey ="id";
    protected $fillable = [
        'id',
        'name',
        'description',
    ];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
