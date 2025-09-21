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
        $posts = Post::with(['tag','user'])->paginate(6);
        $tags = Tag::all();
        return view('posts',compact('posts','tags'));
    }

    public function show($id){
        $post = Post::with(['tag','comment','user'])->findOrFail($id);

        $relatedPost = Post::where('user_id',$post->user_id)
                            ->where('id', '!=', $post->id)
                            ->latest()
                            ->take(5)
                            ->get();
        
        return view('post_content',compact('post','relatedPost'));
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
        $posts = $tag_post->post()->paginate(5);

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
                        })->paginate(6);

        $postsCount = Post::count('id');
        $usersCount = User::count('id');
      

        return view('admin.post_management',compact('postsCount','usersCount','posts'));
    }

    
    public function create(){
        $tags = Tag::all();
        return view('post_create',compact('tags'));
    }

    public function store(Request $request){
 
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string|',
            'tag' => 'required|array',
        ]);

        $post = Post::create([
            'name' => $validated['name'],
            'content'=> $validated['content'],
            'user_id' => Auth::user()->id
        ]);

        $post->tag()->attach($validated['tag']);

        return redirect()->route('post.create');
    }

    public function createReply(Request $request,$id){
        $reply = $request->validate([
            'comment' =>'required|string|max:255',
        ]);

        $parentComment = Comment::findOrFail($id);

        Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $parentComment->post_id,
            'comment' => $reply['comment'],
            'parent_id' => $parentComment->id,
        ]);

        return redirect()->route('show.post',$parentComment->post_id);
    }

    public function edit($id){
        $post = Post::with('tag')->findOrFail($id);
        $tags = Tag::all();

        return view('post_edit',compact('post','tags'));
    }

    public function like($id){
        $post = Post::findOrFail($id);

        $post->increment('likes');

        return back();
    }

  
}
