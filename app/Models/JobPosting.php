<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'quota',
        'qualifications',
        'status',
        'deadline'
    ];

    protected $casts = [
        'qualifications' => 'array',
        'deadline' => 'date'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}