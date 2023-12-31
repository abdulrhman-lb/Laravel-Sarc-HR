<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class training extends Model
{
    use HasFactory;
    protected $fillable = ['training','training_en'];
    public function training_trainer() {
        return $this->hasMany(training_trainer::class);
    }

    public function training_course() {
        return $this->hasMany(training_course::class);
    }
}
