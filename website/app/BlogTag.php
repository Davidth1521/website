<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $fillable = ['title','status'];

    public function blog()
    {
        return $this->belongsToMany(Blog::class);
    }
}
