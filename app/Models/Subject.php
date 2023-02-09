<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', /* teacher_id */
        'grade_level_id',
        'subject_name',
        'subject_code',
        'start',
        'end',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function grade_level() 
    { 
        return $this->belongsTo(GradeLevel::class);
    }
    
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
    
    public function activities() 
    { 
        return $this->hasMany(Activities::class);
    }
}
