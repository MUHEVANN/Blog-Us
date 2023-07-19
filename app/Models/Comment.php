<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'konten',
        'post_id',
        'user_id',
        'reply_comment',
        'reply'
    ];
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
    {
        return $this->hasMany(Comment::class,'reply_comment');
    }
    public function parentComment()
    {
        return $this->belongsTo(Comment::class,'reply_comment');
    }
}