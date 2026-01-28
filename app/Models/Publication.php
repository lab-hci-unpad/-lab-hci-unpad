<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'authors',
        'venue',
        'year',
        'type',
        'doi',
        'volume',
        'pages',
        'isbn',
        'publisher'
    ];

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeByYear($query, $year)
    {
        return $query->where('year', $year);
    }
}