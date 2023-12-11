<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jop_title extends Model
{
    use HasFactory;
    protected $fillable = ['jop_title','jop_title_en'];
    public function profile() {
        return $this->hasMany(profile::class);
    }

    public function position(){
        return $this->hasMany(position::class, 'jop_title_id');
    }
}
