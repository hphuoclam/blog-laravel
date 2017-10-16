<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;

class Comments extends Model
{
    /**
    * Return the comment's author
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function author()
    {
    	return $this->belongsTo(User::class, 'author_id');
    }
    /**
    * Return the comment's post
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
}
