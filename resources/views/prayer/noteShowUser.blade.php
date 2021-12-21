@if ($appPermissao->home_message == true)
    @extends('layouts.base')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="p-5 card">
                        @if (!empty($prayer->image))
                            <div class="post-thumb-gallery">
                                <figure class="post-thumb img-popup">
                                    <img src="{{ $prayer->image }}" alt="post image" width="640" height="640">
                                </figure>
                            </div>
                        @endif
                        <h6>Title:</h6>{{ $prayer->title }}
                        <br>
                        {{ $prayer->content }}

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"><strong>Buscar Pessoa</strong></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('group.storepeoplegroup') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                  <textarea class="form-control" name="note" rows="1">
                                    </textarea>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">Adicionar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection


    @section('javascript')

    @endsection
@else
    @include('errors.redirecionar')
@endif
