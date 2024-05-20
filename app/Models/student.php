<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'student_id',
        'course',
        'year_section',
        'user_id',
        'last_seen' 
    ];
}
