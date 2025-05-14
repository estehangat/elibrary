<?php

namespace App\Models\Lms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lms\Attachment;

class Material extends Model
{
    use HasFactory;

    protected $table = 'tm_material';

    protected $fillable = [
        'material_file',
        'attachment_id',
    ];

    public function attachment()
    {
        return $this->belongsTo(Attachment::class, 'attachment_id');
    }
} 