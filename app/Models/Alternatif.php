<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function kriterias()
    {
        return $this->belongsToMany(Kriteria::class, 'alternatif_kriteria')->withPivot('value')->withTimestamps();
    }
}
