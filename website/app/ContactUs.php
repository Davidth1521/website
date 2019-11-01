<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = ['title','subTitle','detailTitle','emailIcon','emailTitle','addressIcon','addressTitle','websiteIcon','websiteTitle','phoneIcon','phoneTitle','faxIcon','faxTitle','status'];
}
