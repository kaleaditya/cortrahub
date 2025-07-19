<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    use HasFactory;

    protected $table = 'cms';

    protected $fillable = [
        'title',
        'description',
        'page_title',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scope for active records
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for inactive records
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }
}
