<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linkbutton extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'link',        
    ]; 

    public function ajakan()
    {
        return $this->belongsToMany(Ajakan::class);
    }

    public function slider()
    {
        return $this->belongsToMany(Slider::class);
    }

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }
}
