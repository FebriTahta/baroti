<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajakan extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'heading',
        'deskripsi',
    ];

    public function linkbutton()
    {
        return $this->belongsToMany(Linkbutton::class);
    }
}
