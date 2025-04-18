<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    protected $fillable = [
        'student_id',
        'grade_id',
        'date',
        'reason',
        'status',
    ];

    public function student(): BelongsTo{
        return $this->belongsTo(Student::class);
    }

    public function grade(): BelongsTo{
        return $this->belongsTo(Grade::class);
    }
}
