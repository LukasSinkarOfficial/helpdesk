<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\PostCreated;
use Auth;
use App\User;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web,employee');
    }

    public function index()
    {
        $this->authorize('viewEmployee');
        $posts = Post::paginate(10);

        return view('posts.posts', compact('posts'));
    }

    public function userPosts()
    {
        $user_id = Auth::user()->id;
        $posts = Post::where('user_id', $user_id)->paginate(10);

        return view('posts.user-posts', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'category' => 'required|string|exists:categories,name',
            'title' => 'required|string',
            'body' => 'required|string',
            'file' => 'nullable|string'
        ]);

        $post = new Post;
        $post->user_id = $user->id;
        $post->category = request('category');
        $post->title = request('title');
        $post->body = request('body');
        $post->file = request('file');
        $post->save();

        \Mail::to($user)->send(new PostCreated($post));

        return redirect()->route('user.posts')->with('alert', 'Post "'.$post->title.'" created!');
    }

    public function show($id)
    {
        $post = Post::find($id);
        $this->authorize('view', $post);
        
        return view('posts.post', compact('post'));
    }

    public function close($id)
    {
        $this->authorize('viewEmployee');
        $post = Post::find($id);
        Post::where('id', $id)->update(['isClosed' => $post->isClosed ? false : true]);

        return redirect()->route('posts')->with('alert', 'Post "'.$post->title.'" status changed!');
    }

    public function destroy($id)
    {
        $this->authorize('viewEmployee');
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts')->with('alert', 'Post "'.$post->title.'" deleted!');
    }
}
