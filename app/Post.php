<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categories;
use App\Tags;
use App\User;

class Post extends Model
{
    protected $fillable = ['slug', 'category_id', 'user_id', 'title', 'image', 'content', 'aired', 'deleted'];

    public function tags(){
    	return $this->belongsToMany('App\Tags', 'posts_tag', 'post_id', 'tag_id');
    }
    
    public function namaKategori(){
    	return $this->belongsTo('App\Categories', 'category_id');
    }

    public function namaPenulis(){
    	return $this->belongsTo('App\User', 'user_id');
    }
}
