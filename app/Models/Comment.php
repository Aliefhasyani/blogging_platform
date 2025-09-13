<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Metadata\Uses;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['user_id','post_id','comment','parent_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function replies(){
        return $this->hasMany(Comment::class,'parent_id');
    }

    public function parent(){
        return $this->belongsTo(Comment::class ,'parent_id');
    }
}
