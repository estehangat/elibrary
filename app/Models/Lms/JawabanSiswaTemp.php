<?php

namespace App\Models\Lms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lms\QuestionOpsi;
use App\Models\Siswa\Siswa;
use App\Models\Lms\Quiz;
use App\Models\Lms\Question;

class JawabanSiswaTemp extends Model
{
    use HasFactory;

    protected $table = 'student_answer_temp';

    protected $fillable = [
        'is_flagged',
        'selected_option_id',
        'student_id',
        'quiz_id',
        'question_id',
        'question_order',
        'short_answer',
        'essay_answer',
        'end'
    ];

    public function pilihanJawaban()
    {
        return $this->belongsTo(QuestionOpsi::class, 'selected_option_id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'student_id');
    }

    public function kuis()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}