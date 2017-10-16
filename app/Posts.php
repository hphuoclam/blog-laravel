<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\User;

class Posts extends Model
{
    /**
    * Return the post's author
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function author()
    {
    	return $this->belongsTo(User::class, 'author_id');
    }
    /**
    * Return the post's comments
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

}
