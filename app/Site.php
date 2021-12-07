<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
        'title1', 'sub1', 'about_us', 'sub2', 'image'
    ];
}
