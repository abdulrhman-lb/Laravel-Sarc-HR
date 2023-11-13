<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class training_course extends Model
{
    use HasFactory;
    protected $fillable = ['training_id','training_place','training_date_start','training_date_end','training_days_number'];
    public function training_trainee() {
        return $this->hasMany(training_trainee::class);
    }

    public function training() {
        return $this->belongsTo(training::class);
    }    
}
