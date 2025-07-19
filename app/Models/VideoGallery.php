<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    use HasFactory;
    protected $table = 'video_galleries';  // Optional if table name follows Laravel convention

    protected $fillable = [
        'user_id',
        'link',
        'is_active',
    ];



     public function user()
    {
        return $this->belongsTo(User::class);
    }

}
