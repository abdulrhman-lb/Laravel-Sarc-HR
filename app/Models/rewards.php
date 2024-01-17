<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rewards extends Model
{
    use HasFactory;
    protected $fillable = ['reward_id','profile_id','reward_date','reward_source','reward_reason'];

    public function reward_name() {
        return $this->belongsTo(reward_names::class, 'reward_id');
    }

    public function profile() {
        return $this->belongsTo(profile::class,'profile_id');
    }
}
