<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['name', 'context', 'content', 'rating', 'is_active', 'text_styles'];

    protected $casts = [
        'is_active' => 'boolean',
        'rating' => 'integer',
        'text_styles' => 'array',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }
}
