<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'link',
        'product_id'
    ];

    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
