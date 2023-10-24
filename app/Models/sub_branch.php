<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_branch extends Model
{
    use HasFactory;
    protected $fillable = ['sub_branch','sub_branch_en','branch_id'];
    public function profile() {
        return $this->hasMany(profile::class);
    }

    public function branch() {
        return $this->belongsTo(branch::class);
    }
}
