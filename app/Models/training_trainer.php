<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class training_trainer extends Model
{
    use HasFactory;
    protected $fillable = ['training_course_id','trainer_id'];
    public function training_course() {
        return $this->belongsTo(training_course::class);
    }

    public function trainer() {
        return $this->belongsTo(trainer::class);
    }
}
