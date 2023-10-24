<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificate extends Model
{
    use HasFactory;
    protected $fillable = ['certificate','certificate_en'];
    public function profile() {
        return $this->hasMany(profile::class);
    }
}
