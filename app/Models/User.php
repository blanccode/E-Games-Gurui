<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo_path',
        'youtube_account_id',
        'role_id',
        'yt_channel_link',
        'tiktok_channel_link',
        'twitter_channel_link',
        'twitch_channel_link',
        'yt_channel_name',
        'yt_channel_url',
        'yt_channel_views',
        'yt_channel_subs',
        'yt_channel_video_count',
        'yt_channel_playlist_id',
        'score',
        'twitch_id',
        'twitch_display_name',
        'twitch_profile_image_url',
        'twitch_view_count',
        'twitch_followers',
        'twitch_score',
        'status',
    ];

    public function latestPosts() {
        return $this->hasMany(Post::class)->latest();
    }
//    public function latestNews() {
//        return $this->hasMany(News::class)->latest();
//    }

    public function latestAdminArticles() {
        return $this->hasMany(Article::class)->latest();
    }
    public function latestAdminProducts() {
        return $this->hasMany(Product::class)->latest();
    }

    public function posts() {

        return $this->hasMany(Post::class);
    }
    public function orders() {

        return $this->hasMany(Order::class);
    }
    public function news() {

        return $this->hasMany(Post::class);
    }
    public function likes() {

        return $this->hasMany(Like::class);

    }
    public function commentlikes() {

        return $this->hasMany(CommentLike::class);

    }
    public function follows() {

        return $this->hasMany(Follow::class);

    }
//    public function comments() {
//
//        return $this->hasMany(Comment::class);
//
//    }

    public function postLikedOrUnliked($postId) {
        $likeRow = Auth::user()->likes()->where('post_id', $postId)->first();
        if ($likeRow === null) return 'liked';

        return 'unlike';
    }




    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
