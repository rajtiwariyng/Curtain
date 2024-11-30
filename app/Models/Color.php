<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = ['color'];

    // Optionally, add any validation rules or custom functions
    public static $rules = [
        'color' => 'required|max:255'
    ];

    public function Product()
    {
        return $this->belongsToMany(Product::class, 'colors', 'colours','id');
        // return $this->belongsToMany(Color::class, 'colour', 'id');
    }
}
