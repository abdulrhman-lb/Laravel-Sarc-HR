<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penalty_name extends Model
{
    use HasFactory;
    // protected $fillable = ['penalty_name','penalty_name_en'];
    public function penalty() {
        return $this->hasMany(penalty::class);
    }
}
