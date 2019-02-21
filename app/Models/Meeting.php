<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 'user_id', 'slug'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
