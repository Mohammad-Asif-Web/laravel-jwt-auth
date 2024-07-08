<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'mention' => 'array', // Ensure mention field is cast to array
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Post()
    {
        return $this->belongsTo(Post::class,'post_id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }

    // public function parentComment()
    // {
    //     return $this->belongsTo(Comment::class, 'comment_id');
    // }

}
