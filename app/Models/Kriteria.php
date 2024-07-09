<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'weight', 'type'];

    public function alternatifs()
    {
        return $this->belongsToMany(Alternatif::class, 'alternatif_kriteria')->withPivot('value')->withTimestamps();
    }
}
