<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with(['tag','user'])->get();
        $tags = Tag::all();
        return view('posts',compact('posts','tags'));
    }

    public function show($id){
        $post = Post::with(['tag','comment','user'])->findOrFail($id);
        
   
        
        return view('post_content',compact('post'));
    }

    public function createComment(Request $request,$id){
        $comment = $request->validate([
            'comment' => 'required|string|max:455',
           
        ]);
        Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $id,
            'comment' => $comment['comment'],
        ]);

        return redirect()->route('show.post',$id);
    }

    public function searchByTag($id){
        $tag_post = Tag::findOrFail($id);
        $tags = Tag::all();
        $posts = $tag_post->post;

        return view('posts',compact('tag_post','tags','posts'));
    }

    public function destroy($id){
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('posts');
    }

    public function search(Request $request){
        $query = $request->keyword;
      
        $posts = Post::with('user')
                        ->where('name' , 'like' , '%' . $query . '%')
                        ->orWhereHas('user', function($author) use($query){
                            $author->where('name' , 'like' , '%' . $query . '%');
                        })->get();

        $postsCount = Post::count('id');
        $usersCount = User::count('id');
      

        return view('admin.post_management',compact('postsCount','usersCount','posts'));
    }

 

  
}
