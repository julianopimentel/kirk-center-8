@if ($appPermissao->home_message == true)
    @extends('layouts.base')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="p-5 card">
                        @if (!empty($note->image))
                            <div class="post-thumb-gallery">
                                <figure class="post-thumb img-popup">
                                    <img src="{{ $note->image }}" alt="post image" width="640" height="640">
                                </figure>
                            </div>
                        @endif
                        <h6>Title:</h6>{{ $note->title }}
                        <br>
                        {{ $note->content }}

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
