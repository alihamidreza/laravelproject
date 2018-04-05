<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $guarded = [];

    public function path()
    {
        return "/course/$this->slug";
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function episode()
    {
        return $this->hasMany(Episode::class);
    }
}
