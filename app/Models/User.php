<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'full_name',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function post(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function userCategories(): HasManyThrough
    {
        return $this->hasManyThrough(Category::class, Post::class);
    }
}
