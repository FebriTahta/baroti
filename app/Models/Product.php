<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'harga',
        'deskripsi',
        'slug',
        'kategori_id',
        'link_tokped',
        'link_shopee',
        'button'
    ];

    public function link()
    {
        return $this->hasMany(Link::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function linkbutton()
    {
        return $this->belongsToMany(Linkbutton::class);
    }
}
