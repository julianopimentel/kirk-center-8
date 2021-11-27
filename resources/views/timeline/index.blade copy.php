@extends('layouts.baseminimal')
<!-- Styles -->
<link href="{{ asset('css/style-custom.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                @foreach ($posts as $post)
                    <!-- post status start -->
                    <div class="card">
                        <!-- post title start -->
                        <div class="post-title d-flex align-items-center">
                            <!-- profile picture end -->
                            <div class="profile-thumb">
                                <a href="#">
                                    <figure class="profile-thumb-middle">
                                        @if (empty($post->user->image))
                                            <div class="c-avatar"><img class="c-avatar-img"
                                                    src="{{ url('/public/uploads/images/user.png?v=1') }}"
                                                    alt="profile picture"></div>
                                        @endif

                                        @if (!empty($post->user->image))
                                            <div class="c-avatar"><img class="c-avatar-img" src=" {{ $post->user->image }}"
                                                    alt="profile picture"></div>
                                        @endif
                                    </figure>
                                </a>
                            </div>
                            <!-- profile picture end -->

                            <div class="posted-author">
                                <h6 class="author"><a href="profile.html">{{ $post->user->name }}</a></h6>
                                <span class="post-time"> {{$post->created_at}}</span>
                            </div>
                        </div>
                        <!-- post title start -->
                        <div class="post-content">
                            <p class="post-desc">
                                {{ $post->body }}
                            </p>
                            @if (!empty($post->image))
                            <div class="post-thumb-gallery">
                                <figure class="post-thumb img-popup">
                                        <img src="{{ $post->image }}" alt="post image">
                                </figure>
                            </div>
                            @endif
                            <div class="post-meta">
                                <a class="post-meta-like">
                                    <i class="c-icon c-icon-sm cil-cat"></i>
                                    <span>Like
                                        &nbsp;&nbsp;
                                        {{ $post->likes->count() }}</span>
                                </a>
                                <ul class="comment-share-meta">
                                    <li>
                                        <a href="{{ route('timeline.show', $post) }}" class="post-comment ">
                                            <i class="c-icon c-icon-sm cil-comment-bubble"></i>
                                            <span>Comentários</span>&nbsp;&nbsp;
                                            <strong>{{ $post->comments->count() }}</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="post-share">
                                            <i class="c-icon c-icon-sm cil-share-alt"></i>
                                            <span>Share</span>&nbsp;&nbsp;
                                            <strong>{{ $post->comments->count() }}</strong>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
