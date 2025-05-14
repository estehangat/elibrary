<?php

namespace App\Models\Siswa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kbm\Kelas;
use App\Models\Siswa\Siswa;

class KelasSiswa extends Model
{
    use HasFactory;
    protected $table = "student_class";
    protected $fillable = ['class_id','student_id','semester_id'];

    public function kelases()
    {
        return $this->belongsTo(Kelas::class, 'class_id');
    }

    public function siswas()
    {
        return $this->belongsTo(Siswa::class, 'student_id');
    }
}