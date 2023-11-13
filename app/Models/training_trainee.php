<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class training_trainee extends Model
{
    use HasFactory;
    protected $fillable = ['training_course_id','trainee_id'];
    public function training_course() {
        return $this->belongsTo(training_course::class);
    }     

    public function profile() {
        return $this->hasMany(profile::class,'id');
    }    
}
