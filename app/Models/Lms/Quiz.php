<?php

namespace App\Models\Lms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lms\Attachment;
use App\Models\Rekrutmen\Pegawai;
use App\Models\Lms\Question;
use App\Models\Lms\JawabanSiswaTemp;
use App\Models\Lms\JawabanSiswa;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'tm_quiz';

    protected $fillable = [
        'time_limit',
        'total_questions',
        'quiz_open',
        'quiz_close',
        'is_restricted',
        'is_open_book',
        'attachment_id',
        'teacher_id'
    ];

    public function attachment()
    {
        return $this->belongsTo(Attachment::class, 'attachment_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Pegawai::class, 'teacher_id');
    }

    public function question()
    {
        return $this->hasMany(Question::class, 'quiz_id');
    }

    public function jawabanSementara()
    {
        return $this->hasMany(JawabanSiswaTemp::class, 'quiz_id');
    }

    public function jawabanSiswa()
    {
        return $this->hasMany(JawabanSiswa::class, 'quiz_id');
    }
}