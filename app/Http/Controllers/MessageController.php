<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Message;
use App\user;
use App\Employee;
use Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web,employee');
    }

    public function index($id)
    {
        $post = Post::find($id);
        $this->authorize('view', $post);
        $users = User::all();
        $employees = Employee::all();
        $messages = Message::all();

        return view('messages.index', compact('users', 'employees', 'id', 'messages'));
    }

    public function store($id, Request $request)
    {
        $request->validate([
            'body' => 'required|string'
        ]);

        $message = new Message;
        $message->post_id = $id;
        $message->isEmployee = Auth::guard('employee')->check() ? true : false;
        $message->author_id = Auth::user()->id;
        $message->body = request('body');
        $message->save();

        return redirect()->back();
    }
}
