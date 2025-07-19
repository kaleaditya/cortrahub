<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDate extends Model
{
    use HasFactory;
    protected $table = 'order_dates';
    protected $fillable = [
        'id',
        'user_id',
        'order_id',
        'order_status',
        'date',
        'created_at',
        'updated_at'
    ];
}
