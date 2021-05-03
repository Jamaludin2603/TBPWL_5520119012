<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'Laporans';
    use HasFactory;
    protected $fillable = [
        'name',
        'qty',
    ];
}
