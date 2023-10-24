<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penalty extends Model
{
    use HasFactory;

    public function penalty_name() {
        return $this->belongsTo(penalty_name::class);
    }
}
