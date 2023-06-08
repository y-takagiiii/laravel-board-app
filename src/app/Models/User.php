<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

    public function favorites_posts() {
        return $this->belongsToMany(Post::class, 'favorites', 'user_id', 'post_id');
    }

    public function my_posted($post_id) {
        return $this->posts()->where('id', $post_id)->exists();
    }

    public function favorited_post($post_id) {
        return $this->favorites_posts()->where('post_id', $post_id)->exists();
        // dd($this->favorites_posts()->where('post_id', $post_id));
    }
}
