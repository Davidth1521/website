<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable = ['skype_icon','skype_link','googlePlus_icon','googlePlus_link','twitter_icon','twitter_link','linkedin_icon','linkedin_link','facebook_icon','facebook_link','status'];
}
