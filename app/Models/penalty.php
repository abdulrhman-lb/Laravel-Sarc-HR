<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penalty extends Model
{
    use HasFactory;
    protected $fillable = ['penalty_id','profile_id','penalty_date','penalty_source','penalty_reason'];

    public function penalty_name() {
        return $this->belongsTo(penalty_name::class, 'penalty_id');
    }

    public function profile() {
        return $this->belongsTo(profile::class,'profile_id');
    }
}
