<?php

namespace App;
use App\Project;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image', 'project_id'
    ];

    public function project(){

        return $this->belongsTo(Project::class);
    }
}
