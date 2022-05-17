<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'text','image', 'video', 'featured_article', 'read_duration'
    ];

//    public function latestArticle() {
//        return ->latest();
//    }

    public function user() {

        return $this->belongsTo(User::class);
    }
    public function comments() {

        return $this->hasMany(Comment::class);

    }
}
