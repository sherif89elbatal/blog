<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'title','body',
    ];


    public function comments(){

    	return $this->hasMany(Comment::class)->orderBy('created_at');
    }

    public function category(){

    	return $this->belongsTo(Category::class);
    }

    public function likes(){

    	return $this->hasMany(Like::class);
    }
}
