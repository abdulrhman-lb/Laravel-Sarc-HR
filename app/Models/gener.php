<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gener extends Model
{
    use HasFactory;
    protected $fillable = ['gener','gener_en'];
    public function profile() {
        return $this->hasMany(profile::class);
    }
}
