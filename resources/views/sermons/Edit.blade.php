@if ($appPermissao->edit_sermons == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header"><strong>Dados da Palavra</strong></div>
                            <div class="card-body">
                                <form method="POST" action="/sermons/{{ $note->id }}" role="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Titulo</label>
                                                <input class="form-control" type="text" placeholder="{{ __('Title') }}"
                                                    name="title" id="title" value="{{ $note->title }}" required autofocus>
                                            </div>

                                            <div class="form-group">
                                                <label>Mensagem</label>
                                                <textarea class="form-control" id="textarea-input" id="content" name="content" rows="5"
                                                    placeholder="{{ __('Content..') }}"
                                                    required>{{ $note->content }}</textarea>
                                            </div>
                                            <!-- /.row-->
                                            <div class="form-group">
                                                <label>URL do Youtube</label>
                                                <input class="form-control" type="text"
                                                value="{{ $note->url_video }}"
                                                    name="url" id="url" required autofocus>
                                            </div>

                                                <div class="form-group ">
                                                    <div class="form-group">
                                                        <label for="image" class="col-md-4 col-form-label text-md-right">
                                                            Image da capa</label>
                                                        <div class="form-group col-sm-6">
                                                            <input id="image" type="file" class="form-control"
                                                                name="image">
                                                        </div>
                                                    </div>
                                                </div>
                                          
                                            <button class="btn btn-success" type="submit" title="Salvar"><i
                                                    class="c-icon c-icon-sm cil-save"></i></button>
                                            <a class="btn btn-primary" href="{{ route('sermons.index') }}"
                                                title="Voltar"><i class="c-icon c-icon-sm cil-action-undo"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><strong>Complemento</strong></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <div class="form-group">
                                    <label for="ccnumber">Data</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                                <svg class="c-icon">
                                                    <use
                                                        xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-calendar">
                                                    </use>
                                                </svg>
                                        </div>
                                        <input class="form-control" name="applies_to_date" type="date" id="date"
                                            placeholder="date" value="{{ $note->applies_to_date }}"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="ccnumber">Categoria</label>
                                    <div class="input-group">
                                        <select class="form-control" name="type" id="type">
                                            @foreach ($category as $category)
                                                @if ($category->id == $note->type)
                                                    <option value="{{ $category->id }}" selected="true">
                                                        {{ $category->name }}</option>
                                                @else
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="ccnumber">Status</label>
                                    <div class="input-group">
                                        <select class="form-control" name="status_id" id="status_id">
                                            @foreach ($statuses as $status)
                                                @if ($status->id == $note->status_id)
                                                    <option value="{{ $status->id }}" selected="true">
                                                        {{ $status->name }}</option>
                                                @else
                                                    <option value="{{ $status->id }}">
                                                        {{ $status->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
