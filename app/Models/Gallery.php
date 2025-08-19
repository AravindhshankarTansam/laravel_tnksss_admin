<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_ta',
        'desc_en',
        'desc_ta',
        'date',
        'image',
        'is_public',
    ];

    protected $casts = [
        'date' => 'date', // This tells Laravel to cast 'date' to a Carbon instance
        'is_public' => 'boolean',
    ];
}
