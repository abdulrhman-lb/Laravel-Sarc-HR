<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leaves extends Model
{
    use HasFactory;
    protected $fillable = ['leave_name_id','profile_id','start_date','end_date','hr_approve','mang_approve', 'decuments', 'coor_approve','hr_approved','mang_approved', 'coor_approved'];

    public function leave_names() {
        return $this->belongsTo(leave_names::class, 'leave_name_id');
    }

    public function profile() {
        return $this->belongsTo(profile::class,'profile_id');
    }

    public function coor() {
        return $this->belongsTo(profile::class,'coor_approved');
    }

    public function hr() {
        return $this->belongsTo(profile::class,'hr_approved');
    }

    public function mang() {
        return $this->belongsTo(profile::class,'mang_approved');
    }
}
