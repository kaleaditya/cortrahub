<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramEnquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'selected_category',
        'date',
        'location',
        'duration',
        'start_time',
        'attendees',
        'budget',
        'program_brief',
        'pdf_path',
        'selected_trainers',
        'status',
        'admin_notes'
    ];

    protected $casts = [
        'selected_trainers' => 'array',
        'date' => 'date',
        'start_time' => 'datetime:H:i',
        'budget' => 'decimal:2'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getSelectedTrainersDataAttribute()
    {
        if (is_string($this->selected_trainers)) {
            return json_decode($this->selected_trainers, true);
        }
        return $this->selected_trainers;
    }
}
