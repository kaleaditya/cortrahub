<?php

namespace App\Models;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
      protected $fillable = ['title', 'is_active','category_id'];

        public function role()
    {
        return $this->belongsTo(Role::class,'category_id','id');
    }

}


