<?php

namespace App\Models\Lms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lms\Attachment;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'tm_attendance';

    protected $fillable = [
        'attendance_open',
        'attendance_close',
        'attachment_id'
    ];

    public function attachment()
    {
        return $this->belongsTo(Attachment::class, 'attachment_id');
    }
}