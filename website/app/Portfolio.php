<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['status','category_id','detail_id'];

    public function portfolioCategory()
    {
        return $this->hasMany(Portfolio::class);
    }
}
