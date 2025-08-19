<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';

    protected $fillable = [
        'menu_title_en',
        'menu_title_ta',
        'desc_en',
        'desc_ta',
        'is_public'
    ];

    protected $casts = [
        'is_public' => 'boolean',
    ];
}
