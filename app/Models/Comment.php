<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Metadata\Uses;

class Comment extends Model
{
    protected $table = 'comments';


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
