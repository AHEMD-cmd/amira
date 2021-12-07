<?php

namespace App;

use App\Image;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'cover', 'desc',
    ];

    public function images(){

        return $this->hasMany(Image::class);
    }
}
