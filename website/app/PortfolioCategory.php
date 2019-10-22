<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    protected $fillable = ['status','title'];

    public function portfolio()
    {
        return $this->belongsTo(PortfolioCategory::class);
    }
}
