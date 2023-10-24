<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;
    protected $fillable = ['department','department_en','department_short','coordinator_id'];
    public function profile() {
        return $this->hasMany(profile::class);
    }
}
