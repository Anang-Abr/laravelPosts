<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search){
            return $query->where('title', 'like', '%' . $search . '%');
        });
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Author()
    {
        return $this->belongsTo(Author::class);
    }

}
