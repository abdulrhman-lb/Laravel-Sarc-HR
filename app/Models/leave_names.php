<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leave_names extends Model
{
    use HasFactory;
    protected $fillable = ['leave_name', 'leave_source', 'max_day', 'hr_approve_id', 'mang_approve_id'];
    public function leaves() {
        return $this->hasMany(leaves::class, 'id');
    }

    public function hr_approve() {
        return $this->belongsTo(profile::class,'hr_approve_id');
    }

    public function mang_approve() {
        return $this->belongsTo(profile::class,'mang_approve_id');
    }

}
    
