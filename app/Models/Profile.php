<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'subtitle',
        'description',
        'about_details',
        'avatar',
        'cv_path',
        'experience_years',
        'completed_projects',
        'education',
        'location',
    ];
}
