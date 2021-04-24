<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{
    use HasFactory;

    protected $table = 'likes_comments';

    protected $fillable = [
        'user_id', 'comment_id'
    ];
}
