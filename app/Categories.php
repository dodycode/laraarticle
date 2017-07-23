<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = ['category', 'deleted'];

    public function posts(){
    	return $this->hasMany('App\Post', 'category_id')
    	->where('posts.deleted', 0)
    	->where('posts.aired', 1)
    	->orderBy('created_at', 'desc');
    }
}
