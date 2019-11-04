<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable = ['thumbnail','image','status','shortText','description','title','name','author_id'];
    public function categoryBlog()
    {
        return $this->belongsToMany(categoryBlog::class);
    }
    public function tagBlog()
    {
        return $this->belongsToMany(tagBlog::class);
    }
}
