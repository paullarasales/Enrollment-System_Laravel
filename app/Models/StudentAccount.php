<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Authenticable
{
    use HasFactory;

    protected $fillable = [
        'student_number',
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'section_id',
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, enrollments);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
