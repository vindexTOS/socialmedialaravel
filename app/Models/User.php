<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Post;
use App\Models\Likes;
use App\Models\Photos;
use PhpParser\Comment;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    
    use HasFactory, Notifiable ,HasApiTokens;
    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'name',
        'email',
        
        'password',
    ];
    
    /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    /**
    * Get the attributes that should be cast.
    *
    * @return array<string, string>
    */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    /**
    * Define a relationship with comments.
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    /**
    * Define a relationship with likes.
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function likes()
    {
        return $this->hasMany(Likes::class);
    }
    
    
    /**
    * Define a relationship with likes.
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function  photos()
    {
        return $this->hasMany(Photos::class);
    }
}
