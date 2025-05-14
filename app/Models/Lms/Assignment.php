<?php

namespace App\Models\Lms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lms\Attachment;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'tm_assignment';

    protected $fillable = [
        'assignment_open',
        'assignment_close',
        'is_restricted',
        'attachment_id'
    ];

    public function attachment()
    {
        return $this->belongsTo(Attachment::class, 'attachment_id');
    }
}