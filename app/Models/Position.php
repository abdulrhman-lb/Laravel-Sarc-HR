<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = ['profile_id','department_id','start_date','end_date','position','position_en','jop_title_id'];

    public function profile() {
        return $this->belongsTo(profile::class,'profile_id');
    }

    public function department() {
        return $this->belongsTo(department::class,'department_id');
    }

    public function jop_title() {
        return $this->belongsTo(jop_title::class,'jop_title_id');
    }

}
