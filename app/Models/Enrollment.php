<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_accounts_id',
        'subjects_id'
    ];

    public function studentAccount() 
    {
        return $this->belongsTo(StudentAccount::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subjects_id');
    }
}
