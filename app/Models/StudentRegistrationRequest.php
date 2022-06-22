<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistrationRequest extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
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
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
