@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-7">
                    <div class="p-5 card">
                        @if (!empty($post->image))
                            <div class="post-thumb-gallery">
                                <figure class="post-thumb img-popup">
                                    <img src="{{ $post->image }}" alt="post image" width="640" height="640">
                                </figure>
                            </div>
                        @endif
                        <br>
                        <div>{{ $post->body }}</div>
                        <br>
                        @if ($post->user_id == auth()->user()->id)
                            <div class="media-right">
                                @method('DELETE')
                                @csrf
                                <form action="{{ route('timeline.destroy', $post->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a class="show_confirm" data-toggle="tooltip" title='Delete'><i
                                            class="c-icon c-icon-sm cil-trash text-danger"></i>
                                    </a>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-5">
                    <div class="card-header">
                        <div class="card-body">
                            <form method="POST" action="{{ route('timeline.store', $post->id) }}">
                                @csrf
                                <div class="form-group row">
                                    <textarea class="form-control" id='comment' name="comment" rows="2"
                                        placeholder="Mensagem.."></textarea>
                                </div>
                                <button class="btn btn-sm btn-success" type="submit">Comentar</button>
                        </div>
                        </form>
                    </div>
                    <br>
                   
                            <div class="card-header">
                                    <h6>Comentários</h6>
                                    @foreach ($comments as $comment)
                                        <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                            <li class="media">
                                                <img alt="image" class="mr-3 rounded-circle" width="70" height="70"
                                                    src="{{ $comment->user->image }}">
                                                <div class="media-body">
                                                    @if ($comment->user_id == auth()->user()->id)
                                                        <div class="media-right">
                                                            <a href="{{ url('comment/' . $comment->id . '/edit') }}"> <i
                                                                    class="c-icon c-icon-sm cil-pencil text-success"></i></a>
                                                        </div>
                                                        <div class="media-right">
                                                            @method('DELETE')
                                                            @csrf
                                                            <form action="{{ route('comment.destroy', $comment->id) }}"
                                                                method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <a class="show_confirm" data-toggle="tooltip"
                                                                    title='Delete'><i
                                                                        class="c-icon c-icon-sm cil-trash text-danger"></i>
                                                                </a>
                                                            </form>
                                                        </div>
                                                    @endif
                                                    <div class="media-title mb-1"> {{ $comment->user->name }}</div>
                                                    <div class="text-time"> 
                                                        Publica em {{ datarecente($comment->created_at) }}
                                                    </div>
                                                    <div class="media-description text-muted">
                                                        {{ $comment->comment }}
                                                    </div>
                                                </div>
                                            </li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('javascript')
    @endsection
