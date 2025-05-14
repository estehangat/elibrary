<?php

namespace App\Models\Lms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lms\Question;

class QuestionIsianSingkat extends Model
{
    use HasFactory;

    protected $table = 'tm_question_short_answer';

    protected $fillable = [
        'question_answer',
        'question_id'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}