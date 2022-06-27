<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Posts extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    protected $with = ['category', 'user'];

    public function scopeFilter($query, array $filters)
    {
        // ketiga baris kode dibawah ini bisa dianggap berfungsi sama hanya ditulis dalam beberapa cara yang berbeda
        $query->when(isset($filters['search']) ? $filters['search'] : false, function ($query, $search){
            return $query->where(function($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            });
        });
        $query->when($filters['category'] ?? false, function ($query, $category){
            return $query->whereHas('category',function($query) use ($category) { // penggunaan callback function membuat scope variabel  
                $query->where('slug', 'like', '%' . $category . '%');               //$category tidak dapat diakses sehingga membutuhkan keyword 'use'
                //whereHas berguna untuk menggabungkan tabel berdasarkan relationshipnya
            });
        });
         $query->when($filters['author'] ?? false, function ($query, $author){
            return $query->whereHas('user',fn($query) => //penggunaan arrow function membuat variabel $author dapat diakses secara langsung
                $query->where('slug', 'like', '%' . $author . '%')
            );
        });
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function Sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
