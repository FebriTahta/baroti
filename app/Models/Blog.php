<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'deskripsi',
        // 'img_thumbnail',
        'jenis_id',
        'slug',
        'img_thumbnail',
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function komen()
    {
        return $this->hasMany(Komen::class);
    }
}
