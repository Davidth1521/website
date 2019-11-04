<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoryBlog extends Model
{
    protected $fillable = ['title','parent_id','status'];

    public function blog()
    {
        return $this->belongsToMany(Blog::class);
    }
}
