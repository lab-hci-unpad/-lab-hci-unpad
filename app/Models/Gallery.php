<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'image',
        'category',
        'semester',
        'year',
        'author',
        'tech_stack',
        'demo_url',
        'github_url',
        'is_featured',
        'is_published'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
