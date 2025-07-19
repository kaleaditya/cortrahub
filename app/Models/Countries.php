<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = [
        'id',
        'country_name',
        'is_active',
        'created_at',
        'updated_at'
    ];
}
