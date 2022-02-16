<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use DateTime;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use Response;

class TimelineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission');
        $this->middleware('system');
    }

    public function show($id)
    {
        //pegar tenant
        $this->get_tenant();

        $post = Post::find($id);

        if (!$post) {
            session()->flash("info", "Post não encontrado");
            return view('timeline.index');
        }

        $comments = $post->comments()->with('user:id,name,profile_image')->get();
        return view('timeline.show', compact('post', 'comments'));
    }

    public function getArticles(Request $request)
    {
        $results = Post::orderBy('id', 'desc')->with('user:id,name,profile_image')->withCount('comments', 'likes')
            ->with('likes', function ($like) {
                return $like->where('user_id', auth()->user()->id)
                    ->select('id', 'user_id', 'post_id');
            })
            ->paginate(10);
        $artilces = '';
        if ($request->ajax()) {
            foreach ($results as $result) {

                $dateTime1 = new DateTime($result->created_at);
                $dateTime2 = new DateTime();
                $interval = $dateTime1->diff($dateTime2);

                if ($interval->format('%y') > 0) {
                    if ($dateTime2 >= $interval->format('%y')) {
                        $valorhora = $interval->format('%y anos') . PHP_EOL;
                    }
                }
                if ($interval->format('%m') > 0) {
                    if ($dateTime2 >= $interval->format('%m')) {
                        $valorhora = $interval->format('%m meses') . PHP_EOL;
                    }
                } else {
                    if ($interval->format('%d') > 0) {
                        if ($dateTime2 >= $interval->format('%d')) {
                            $valorhora = $interval->format('%d dias') . PHP_EOL;
                        }
                    } else {
                        if ($dateTime2 >= $interval->format('%h')) {
                            if ($interval->format('%h') > 0) {
                                $valorhora = $interval->format('%h horas') . ' ' . $interval->format('%i minutos') . PHP_EOL;
                            } else {
                                $valorhora = $interval->format('%i minutos') . ' ' . $interval->format('%s segundos') . PHP_EOL;
                            }
                        }
                    }
                }


                $artilces .= '
                <div class="card">
                <!-- post title start -->
                <div class="post-title d-flex align-items-center">
                    <!-- profile picture end -->
                    <div class="profile-thumb">
                        <a href="#">
                            <figure class="profile-thumb-middle">
                                    <div class="c-avatar"><img alt="image" class="mr-3 rounded-circle" width="70" height="70" src="' . $result->user->image . '"
                                            alt="profile picture"></div>
                            </figure>
                        </a>
                    </div>
                    <!-- profile picture end -->

                    <div class="posted-author">
                        <h6 class="author">' . $result->user->name . '</h6>
                        <span class="post-time">' . $valorhora . '</span>
                    </div>
                </div>
                <!-- post title start -->
                <div class="post-content">
                    <p class="post-desc">
                        ' . $result->body . '
                    </p>
                        <div class="post-thumb-gallery">
                        <figure class="post-thumb img-popup">
                                <img src="' . $result->image . '">
                        </figure>
                    </div>

                    <div class="post-meta">
                        <a class="post-meta-like">
                            <i class="c-icon c-icon-sm cil-cat"></i>
                            <span>Like
                                &nbsp;&nbsp;
                                ' . $result->likes->count() . '</span>
                        </a>
                        <ul class="comment-share-meta">
                            <li>
                                <a href="/timeline/' . $result->id . '" class="post-comment ">
                                    <i class="c-icon c-icon-sm cil-comment-bubble"></i>
                                    <span>Comentários</span>&nbsp;&nbsp;
                                    <strong>' . $result->comments->count() . '</strong>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>';
            }
            return $artilces;
        }
        return view('timeline.index');
    }

    public function store(Request $request)
    {
        //pegar tenant
        $this->get_tenant();
        $validatedData = $request->validate([
            'body'           => 'required',
        ]);
        //user data
        $user = auth()->user();
        $posts = new Post();
        $posts->body     = $request->input('body');
        $posts->user_id = $user->id;
        $posts->save();
        //adicionar log
        $this->adicionar_log('17', 'C', $posts);
        return redirect()->route('timeline.index');
    }


    //comentario na timezone
    public function storecomentario($id, Request $request)
    {
        //pegar tenant
        $this->get_tenant();

        $post = Post::find($id);

        if (!$post) {
            session()->flash("info", "Post não encontrado");
            return view('timeline.index');
        }

        Comment::create([
            'comment' => $request->input('comment'),
            'post_id' => $id,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back();
    }
}
