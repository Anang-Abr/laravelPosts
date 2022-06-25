<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function Posts()
    {
        return $this->hasMany(Posts::class);
    }
    // public function Users()
    // {
    //     return $this->hasOne(Users::class, 'user_id');
    // }
}
