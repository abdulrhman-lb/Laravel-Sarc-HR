<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id','sub_branch_id','point','department_id','first_name','last_name','father_name','mother_name','national_number',
        'gener_id','birth_place','birth_date','blood_group','marital_status_id','mobile_phone','phone','email','certificate_id',
        'certificate_details','position','volunteering_date','hire_date','full_name_en','position_en','shoes_size','waist_size',
        'shoulders_size','image', 'user_id', 'jop_title_id','slug'
    ];

    public function department() {
        return $this->belongsTo(department::class);
    }

    public function user() {
        return $this->belongsTo(user::class);
    }

    public function branch() {
        return $this->belongsTo(branch::class);
    }

    public function sub_branch() {
        return $this->belongsTo(sub_branch::class);
    }

    public function certificate() {
        return $this->belongsTo(certificate::class);
    }

    public function gener() {
        return $this->belongsTo(gener::class);
    }

    public function jop_title() {
        return $this->belongsTo(jop_title::class);
    }

    public function marital_status() {
        return $this->belongsTo(marital_status::class);
    }

    public function trainee() {
        return $this->hasMany(training_trainee::class,);
    }

    public function trainingCourses()
    {
        return $this->hasMany(Training_Trainee::class, 'trainee_id');
    }
}
