<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    use HasFactory;
    protected $fillable = ['branch','branch_en'];
    public function profile() {
        return $this->hasMany(profile::class);
    }

    public function sub_branch() {
        return $this->hasMany(sub_branch::class);
    }
}
