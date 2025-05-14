<?php

namespace App\Models\Lms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lms\Quiz;
use App\Models\Lms\QuestionPilihanGanda;
use App\Models\Lms\QuestionIsianSingkat;
use App\Models\Lms\QuestionEssay;
use App\Models\Lms\JawabanSiswaTemp;
use App\Models\Lms\JawabanSiswa;

class Question extends Model
{
    use HasFactory;

    protected $table = 'tm_question';

    protected $fillable = [
        'question',
        'question_type',
        'question_explanation',
        'question_image',
        'question_weight',
        'quiz_id'
    ];

    public function quiz(){
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public function questionPilgan()
    {
        return $this->hasOne(QuestionPilihanGanda::class, 'question_id');
    }

    public function questionIsian()
    {
        return $this->hasOne(QuestionIsianSingkat::class, 'question_id');
    }

    public function questionEssay()
    {
        return $this->hasOne(QuestionEssay::class, 'question_id');
    }

    public function jawabanSementara()
    {
        return $this->hasMany(JawabanSiswaTemp::class, 'question_id');
    }

    public function jawabanSiswa()
    {
        return $this->hasMany(JawabanSiswa::class, 'question_id');
    }
}