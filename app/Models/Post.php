<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Photos;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'caption'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
 
    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
    public function photo()
    {
        return $this->hasMany(Photos::class);
    }
}


