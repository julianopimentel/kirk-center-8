@if ($appPermissao->home_message == true)
    @extends('layouts.base')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="p-5 card">
                        <h6>Title: {{ $note->title }}</h6>
                        @if (!empty($note->image))
                            <div class="post-thumb-gallery">
                                <figure class="post-thumb img-popup">
                                    <img src="{{ $note->image }}" alt="post image" width="640" height="640">
                                </figure>
                            </div>
                        @endif
                        <br>
                        {{ $note->content }}
                        <br>
                        <br>
                        Publicado em {{datarecente($note->created_at)}}
                    </div>
                </div>
            </div>

        </div>
    @endsection


    @section('javascript')
    @endsection
@else
    @include('errors.redirecionar')
@endif
