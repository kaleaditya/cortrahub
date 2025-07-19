<?php

// app/Models/ManageDocument.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageDocument extends Model
{
    use HasFactory;
    protected $table = 'user_documents';

    protected $fillable = ['user_id', 'document', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


?>
