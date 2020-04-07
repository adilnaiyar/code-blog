<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'post_id',
    	'is_active',
    	'author',
    	'email',
    	'photo',
    	'body',
    ];

    public function Reply()
    {
    	return $this->hasMany('App\CommentReply');
    }

    public function post()
    {
    	return $this->belongsTo('App\Post');
    }
}
