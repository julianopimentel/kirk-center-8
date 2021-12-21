@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="p-5 card">
                    @if (!empty($post->image))
                    <div class="post-thumb-gallery">
                        <figure class="post-thumb img-popup">
                                <img src="{{ $post->image }}" alt="post image"  width="640" height="640">
                        </figure>
                    </div>
                    @endif
                    <div>{{ $post->body }}</div>
                </div>
                
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Comments</h4>
                            </div>
                            <div class="card-body">
                                @foreach ($comments as $comment)
                                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                        <li class="media">
                                            <img alt="image" class="mr-3 rounded-circle" width="70" height="70"
                                                src="{{ $comment->user->image }}">
                                            <div class="media-body">
                                                <div class="media-title mb-1"> {{ $comment->user->name }}</div>
                                                <div class="text-time">{{ $comment->created_at }}</div>
                                                <div class="media-description text-muted">
                                                    {{ $comment->comment }}
                                                </div>
                                                <div class="media-links">
                                                    <div class="bullet"></div>
                                                    <a href="#">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="#" class="text-danger">Trash</a>
                                                </div>
                                            </div>
                                        </li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endsection
