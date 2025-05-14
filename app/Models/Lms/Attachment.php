<?php

namespace App\Models\Lms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lms\Material;
use App\Models\Lms\Discussion;
use App\Models\Lms\Attendance;
use App\Models\Lms\Assignment; 
use App\Models\Lms\Quiz;
use App\Models\Lms\Topic;
 

class Attachment extends Model
{
    use HasFactory;

    protected $table = 'tm_attachment';
 
    protected $fillable = [
        'attachment_title',
        'attachment_description',
        'attachment_type',
        'topic_id'
    ];

    protected static function booted()
    {
        static::deleting(function ($attachment) {
            if ($attachment->material) {
                $attachment->material->delete();
            }

            if ($attachment->discussion) {
                $attachment->discussion->delete();
            }

            if ($attachment->attendance) {
                $attachment->attendance->delete();
            }

            if ($attachment->assignment) {
                $attachment->assignment->delete();
            }

            if ($attachment->quiz) {
                $attachment->quiz->delete();
            }
        });
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }
    
    public function material()
    {
        return $this->hasOne(Material::class, 'attachment_id');
    }

    public function discussion()
    {
        return $this->hasOne(Discussion::class, 'attachment_id');
    }

    public function attendance()
    {
        return $this->hasOne(Attendance::class, 'attachment_id');
    }

    public function assignment()
    {
        return $this->hasOne(Assignment::class, 'attachment_id');
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class, 'attachment_id');
    } 
}