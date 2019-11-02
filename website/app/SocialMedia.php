<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable = ['id','skype_icon','skype_link','googlePlus_icon','googlePlus_link','twitter_icon','twitter_link','linkedin_icon','linkedin_link','facebook_icon','facebook_link','status','rss_link','rss_icon','youtube_icon','youtube_link','vimo_link','vimo_icon'];
}
