@if ($appPermissao->edit_prayer == true)
@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><strong>Dados da Oração</strong></div>
                        <div class="card-body">
                            <form method="POST" action="/prayer/{{ $prayer->id }}" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Titulo</label>
                                            <input class="form-control" type="text" placeholder="{{ __('Title') }}"
                                                name="title" value="{{ $prayer->title }}" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label>Mensagem</label>
                                            <textarea class="form-control" id="textarea-input" name="content" rows="9"
                                                placeholder="{{ __('Content..') }}" required>{{ $prayer->content }}</textarea>
                                        </div>
                                        <!-- /.row-->
                                        <div class="row">
                                            <div class="form-group col-sm-3">
                                                <div class="form-group">
                                                    <label for="ccnumber">Status</label>
                                                    <div class="input-group">
                                                        <select class="form-control"name="status_id">
                                                            @foreach($statuses as $status)
                                                                @if( $status->id == $prayer->status_id )
                                                                    <option value="{{ $status->id }}" selected="true">{{ $status->name }}</option>
                                                                @else
                                                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <div class="form-group">
                                                    <label for="ccnumber">Type</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text"
                                                            placeholder="{{ __('Note type') }}" name="note_type" value="{{ $prayer->note_type }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <div class="form-group">
                                                    <label for="public">Público</label>
                                                    <div class="input-group">
                                                        <label
                                                            class="c-switch c-switch-label c-switch-pill c-switch-primary">
                                                            <input class="c-switch-input" name="public"
                                                                type="checkbox" {{ $prayer->public == true ? 'checked' : '' }}><span class="c-switch-slider"
                                                                data-checked="&#x2713" data-unchecked="&#x2715"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    <a class="btn btn-dark" href="{{ route('prayer.index') }}">Return</a>
                            </form>
                        </div>
                    </div>
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