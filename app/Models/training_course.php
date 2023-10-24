<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class training_course extends Model
{
    use HasFactory;

    public function training_trainee() {
        return $this->hasMany(training_trainee::class);
    }

    public function training_name() {
        return $this->belongsTo(training_name::class);
    }    
}
