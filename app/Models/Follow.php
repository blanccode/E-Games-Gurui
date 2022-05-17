<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [ 'follow' , 'user_id', 'followed_user'];

    public function user() {
        return $this->belongsTo('User');
    }
//    public function post() {
//        return $this->belongsTo('Post');
//    }
}
