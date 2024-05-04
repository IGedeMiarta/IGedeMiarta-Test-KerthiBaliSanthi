<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function getAuthor()
    {
        return $this->belongsTo(Author::class,'author_id');
    }
    public function getCategory()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
