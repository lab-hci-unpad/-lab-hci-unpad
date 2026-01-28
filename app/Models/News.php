<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'gallery_images',
        'published_at',
        'status'
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'published_at' => 'datetime'
    ];

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}