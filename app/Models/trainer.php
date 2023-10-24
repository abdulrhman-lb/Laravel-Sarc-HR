<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trainer extends Model
{
    use HasFactory;

    public function training_trainer() {
        return $this->hasMany(training_trainer::class);
    }
}
