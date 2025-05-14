<?php

namespace App\Models\Lms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lms\Attachment;

class Discussion extends Model
{
    use HasFactory;

    protected $table = 'tm_discussion';

    protected $fillable = [
        'discussion_open',
        'discussion_close',
        'is_restricted',
        'attachment_id'
    ];

    public function attachment()
    {
        return $this->belongsTo(Attachment::class, 'attachment_id');
    }
}