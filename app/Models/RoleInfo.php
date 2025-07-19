<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleInfo extends Model
{
    use HasFactory;

      protected $fillable = [
        'role_id',
        'image',
        'meta_title',
        'meta_kewords',
        'meta_description',
        'short_order',
        'slug',
        'is_active',
    ];

}
