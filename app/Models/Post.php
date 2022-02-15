<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','image','category_id'];
    
    // Jointure sur la catégorie
    public function category(){
        return $this->belongsTo(Category::class);
    }
}

