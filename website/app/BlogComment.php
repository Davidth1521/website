<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $fillable = ['name','blog_id','parent_id','email','website','message'];
}
