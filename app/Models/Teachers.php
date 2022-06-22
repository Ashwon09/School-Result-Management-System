<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;
    
    protected $fillable = [
      
        'first_name',
        'last_name',
        'contact_number',
        'email',
        'gender',
        'subject_id',
    ];

    public function subject(){
        return $this->belongsTo(subject::class);
    }
}
