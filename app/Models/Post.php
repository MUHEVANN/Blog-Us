<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'foto',
        'category_id',
        'viwers',
      
        
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
}