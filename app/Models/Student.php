<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'symbol_number',
        'first_name',
        'last_name',
        'contact_number',
        'email',
        'dob',
        'gender',
        'class',
        'father_name',
        'province',
        'district',
        'address',
    ];

    public function user(){
        return $this->belongsTo(user::class);
    }

    public function marks(){
        return $this->hasMany(marks::class);
    }

    public function Student_images(){
        return $this->hasOne(StudentImage::class);
    }
}

