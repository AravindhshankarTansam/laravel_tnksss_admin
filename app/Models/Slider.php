<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en', 'title_ta', 'images', 'desc_en', 'desc_ta', 'is_public'
    ];

    protected $casts = [
        'images' => 'array',      // JSON array
        'is_public' => 'boolean', // true/false
    ];
}
