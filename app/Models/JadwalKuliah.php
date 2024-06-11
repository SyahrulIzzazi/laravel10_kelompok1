<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class JadwalKuliah extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['kelas','mata_kuliah_id','dosen','hari','waktu'];

    public function MataKuliah(): BelongsTo{
        return $this->belongsTo(MataKuliah::class);
    }
}
