<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'categorie_id', 'tags', 'image1', 'image2', 'image3'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }
}
