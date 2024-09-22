<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_name',
        'year_level',
        'code'
    ];

    public function students()
    {
        return $this->belongsToMany(StudentAccount::class, 'enrollments');
    }
}
