<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{
    use HasFactory;

    protected $fillable = [ 'like' , 'user_id', 'comment_id'];


    public function comment() {
        return $this->belongsTo('Comment');
    }

    public function user() {
        return $this->belongsTo('User');
    }
}
