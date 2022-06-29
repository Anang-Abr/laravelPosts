<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    
    public function Posts()
    {
        return $this->hasMany(Posts::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

     public function Sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
