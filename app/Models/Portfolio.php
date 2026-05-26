<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'thumbnail',
        'technologies',
        'github_url',
        'demo_url',
        'featured',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];
}
