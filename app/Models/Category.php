<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'name'
    ];
    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'category_users', 'category_id', 'user_id');
    }
}
