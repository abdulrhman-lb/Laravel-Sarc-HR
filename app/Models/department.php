<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;
    protected $fillable = ['department','department_en','department_short','coordinator_id','department_address','donor','department_information','coordinator_name','coordinator_mobile','coordinator_email'];
    public function profile() {
        return $this->hasMany(profile::class);
    }

    public function position(){
        return $this->hasMany(position::class, 'department_id');
    }
}
