<?php

namespace App\Models\Lms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kbm\MataPelajaran;
use App\Models\Kbm\TahunAjaran;
use App\Models\Lms\Attachment;

class Topic extends Model
{
    use HasFactory;

    protected $table = "tm_topic";

    protected $fillable = [
        'topic_title',
        'topic_description',
        'is_hidden',
        'subject_id',
        'academic_year_id'
    ];

    protected static function booted()
    {
        static::deleting(function ($topic) {
            foreach ($topic->attachment as $attachment) {
                $attachment->delete(); 
            }
        });
    }

    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'subject_id');
    }

    public function tahunAkademik()
    {
        return $this->belongsTo(TahunAjaran::class, 'academic_year_id');
    }

    public function attachment()
    {
        return $this->hasMany(Attachment::class, 'topic_id');
    }
}