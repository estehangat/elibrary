<?php

namespace App\Models\Lms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lms\QuestionPilihanGanda;
use App\Models\Lms\JawabanSiswaTemp;
use App\Models\Lms\JawabanSiswa;

class QuestionOpsi extends Model
{
    use HasFactory;

    protected $table = 'tm_question_option';

    protected $fillable = [
        'option_text',
        'is_correct',
        'question_mc_id'
    ];

    public function questionPilgan()
    {
        return $this->belongsTo(QuestionPilihanGanda::class, 'question_mc_id');
    }

    public function jawabanSementara()
    {
        return $this->hasMany(JawabanSiswaTemp::class, 'selected_option_id');
    }

    public function jawabanSiswa()
    {
        return $this->hasMany(JawabanSiswa::class, 'selected_option_id');
    }
}