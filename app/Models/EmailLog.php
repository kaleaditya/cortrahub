<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
    protected $fillable = [
        'company_id', 'trainer_id', 'to_email', 'subject', 'body', 'pdf_name'
    ];
} 