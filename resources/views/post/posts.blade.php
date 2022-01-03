@extends('layouts.baseminimal')


@section('content')


    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Posts</div>
                    <div class="card-body">

                        @if ($posts->count())
                            @foreach ($posts as $post)

                                <article class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="jumbotron">
                                        <div class="panel panel-info" data-id="{{ $post->id }}">
                                            <h1 class="display-4">{{ $post->title }}</h1>
                                            <p class="lead">This is a simple hero unit, a simple jumbotron-style
                                                component for calling extra attention to featured content or information.
                                            </p>
                                            <hr class="my-4">
                                            <p>It uses utility classes for typography and spacing to space content out
                                                within the larger container.</p>
                                            <a class="btn btn-primary btn-lg" href="posts/{{ $post->id }}"
                                                role="button">Learn more</a>

                                        </div>
                                        <div class="panel-footer">
                                            <span class="pull-right">
                                                <span class="like-btn">
                                                    <i id="like{{ $post->id }}"
                                                        class="glyphicon glyphicon-thumbs-up {{ auth()->user()->hasLiked($post)
    ? 'like-post'
    : '' }}"></i>
                                                    <div id="like{{ $post->id }}-bs3">
                                                        {{ $post->likers()->get()->count() }}</div>
                                                </span>
                                            </span>
                                        </div>
                                    </div>

                                </article>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('i.glyphicon-thumbs-up, i.glyphicon-thumbs-down').click(function() {
                var id = $(this).parents(".panel").data('id');
                var c = $('#' + this.id + '-bs3').html();
                var cObjId = this.id;
                var cObj = $(this);


                $.ajax({
                    type: 'POST',
                    url: '/ajaxRequest',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (jQuery.isEmptyObject(data.success.attached)) {
                            $('#' + cObjId + '-bs3').html(parseInt(c) - 1);
                            $(cObj).removeClass("like-post");
                        } else {
                            $('#' + cObjId + '-bs3').html(parseInt(c) + 1);
                            $(cObj).addClass("like-post");
                        }
                    }
                });


            });


            $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
        });
    </script>
@endsection
