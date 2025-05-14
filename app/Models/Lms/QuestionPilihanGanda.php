<?php

namespace App\Models\Lms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lms\Question;
use App\Models\Lms\QuestionOpsi;

class QuestionPilihanGanda extends Model
{
    use HasFactory;

    protected $table = 'tm_question_mc';

    protected $fillable = [
        'question_id'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function opsi()
    {
        return $this->hasMany(QuestionOpsi::class, 'question_mc_id');
    }
}