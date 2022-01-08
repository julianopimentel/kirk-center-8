<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Validator;
use Redirect;
use Response;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission');
        $this->middleware('system');
    }

    // get all comments of a post
    public function index($id)
    {
        //pegar tenant
        $this->get_tenant();

        $post = Post::find($id);

        if (!$post) {
            session()->flash("info", "Post não encontrado");
            return redirect()->route('timeline.index');
        }

        $comments = $post->comments()->with('user:id,name,profile_image')->get();
        return view('timeline.show', compact('post', 'comments'));
    }

    // create a comment
    public function store($id, Request $request)
    {
        //pegar tenant
        $this->get_tenant();

        $post = Post::find($id);

        if (!$post) {
            session()->flash("info", "Post não encontrado");
            return redirect()->route('timeline.index');
        }

        Comment::create([
            'comment' => $request->input('comment'),
            'post_id' => $id,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back();
    }

    public function edit($id)
    {
        //pegar tenant
        $this->get_tenant();
        $comment = Comment::find($id);
        //validar o id se existe
        if (!$comment) {
            session()->flash("info", "Comentário não encontrado");
            return redirect()->back();
        }

        if ($comment->user_id != auth()->user()->id) {
            session()->flash("warning", "Você não possui permissão");
            return redirect()->back();
        }
        return view('timeline.comment', compact('comment'));
    }

    // update a comment
    public function update(Request $request, $id)
    {
        //pegar tenant
        $this->get_tenant();
        $comment = Comment::find($id);

        if (!$comment) {
            session()->flash("info", "Comentário não encontrado");
            return redirect()->back();
        }

        if ($comment->user_id != auth()->user()->id) {
            session()->flash("warning", "Você não possui permissão");
            return redirect()->back();
        }

        //validate fields
        $attrs = $request->validate([
            'comment' => 'required|string'
        ]);

        $comment->update([
            'comment' => $request->input('comment'),
        ]);
        return redirect()->route('timeline.index');
    }

    // delete a comment
    public function destroy($id)
    {
        //pegar tenant
        $this->get_tenant();
        $comment = Comment::find($id);

        if (!$comment) {
            session()->flash("info", "Comentário não encontrado");
            return redirect()->back();
        }

        if ($comment->user_id != auth()->user()->id) {
            session()->flash("warning", "Você não possui permissão");
            return redirect()->back();
        }

        $comment->delete();

        session()->flash("warning", "Comentário deletado com sucesso");
        return redirect()->back();
    }
}
