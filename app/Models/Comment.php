<?php

namespace App\Models;

use App\Traits\HasCommentable;
use App\Traits\HasReplies;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//use Cog\Contracts\Love\Reactable\Models\Reactable as ReactableInterface;
//use Cog\Laravel\Love\Reactable\Models\Traits\Reactable;

use Illuminate\Database\Eloquent\Model;



class Comment extends Model
//    implements ReactableInterface
{
    use HasFactory;
    use HasCommentable;
    use HasReplies;

//    use Reactable;


    protected $with = [
        'repliesRelation'
    ];

    protected $guarded = [];

    public function parentId() {
        return $this->parent_id;
    }

    public function post() {

        return $this->belongsTo(Post::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function commentlikes() {
        return $this->hasMany(CommentLike::class);
    }
    public function replies() {
        return $this->hasMany(Comment::class, 'parent_id');
    }

}
