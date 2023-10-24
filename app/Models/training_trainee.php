<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class training_trainee extends Model
{
    use HasFactory;

    public function training_course() {
        return $this->belongsTo(training_course::class);
    }    

    public function profile() {
        return $this->belongsTo(profile::class);
    }    
}
