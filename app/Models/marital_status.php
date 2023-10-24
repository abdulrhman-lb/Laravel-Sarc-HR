<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marital_status extends Model
{
    use HasFactory;
    protected $fillable = ['marital_status','marital_status_en'];
    public function profile() {
        return $this->hasMany(profile::class);
    }
}
