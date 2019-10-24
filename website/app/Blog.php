<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function blogCategory()
    {
        return $this->belongsToMany(BlogCategory::class);
    }
    public function blogTag()
    {
        return $this->belongsToMany(BlogTag::class);
    }
}
