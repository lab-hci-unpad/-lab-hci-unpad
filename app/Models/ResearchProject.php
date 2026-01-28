<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'funding_source',
        'year',
        'status'
    ];

    public function scopeByYear($query, $year)
    {
        return $query->where('year', $year);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}