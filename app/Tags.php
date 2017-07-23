<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Tags extends Model
{
    protected $fillable = ['tag', 'deleted'];

    public function posts(){
    	return $this->belongsToMany('App\Post', 'posts_tag', 'post_id', 'tag_id')
    	->where('posts.deleted', 0);
    }
}
