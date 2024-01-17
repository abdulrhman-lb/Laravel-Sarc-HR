<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reward_names extends Model
{
    use HasFactory;
    protected $fillable = ['reward_name'];
    public function penalty() {
        return $this->hasMany(rewards::class, 'id');
    }
}
