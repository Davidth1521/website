<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio_detail extends Model
{
    protected $fillable = ['title','imageDescription','btnTitle','btnLink','linkedinLink','linkedinIcon','GooglePlusLink','GooglePlusIcon','twitterLink','twitterIcon','facebookLink','facebookIcon','detailDescription','status','image'];
}
