<?php

namespace App\Models\Lms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lms\QuestionOpsi;
use App\Models\Siswa\Siswa;
use App\Models\Lms\Quiz;
use App\Models\Lms\Question;

class JawabanSiswa extends Model
{
    use HasFactory;

    protected $table = 'student_answer';

    protected $fillable = [
        'selected_option_id',
        'student_id',
        'quiz_id',
        'question_id'
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