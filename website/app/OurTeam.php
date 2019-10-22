<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    protected $fillable = ['name','role','facebook_link','facebook_icon','twitter_link','twitter_icon','linkedin_link','linkedin_icon','description','image','status'];
}
