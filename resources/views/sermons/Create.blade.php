@if ($appPermissao->add_sermons == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header"><strong>Dados da Palavra</strong></div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('sermons.store') }}" role="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Titulo</label>
                                                <input class="form-control" type="text" placeholder="{{ __('Title') }}"
                                                    name="title" required autofocus>
                                            </div>

                                            <div class="form-group">
                                                <label>Texto</label>
                                                <textarea class="form-control"  name="content" rows="5"
                                                    placeholder="{{ __('Content..') }}" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>URL do Youtube</label>
                                                <input class="form-control" type="text"
                                                    placeholder="https://www.youtube.com/watch?v=d8u9uL9Ilyk&t=20s"
                                                    name="url" required autofocus>
                                            </div>
                                            <!-- /.row-->
                                            <div class="form-group">
                                                <label for="image" class="col-md-4 col-form-label text-md-right">
                                                    Image da capa</label>
                                                <div class="form-group col-sm-6">
                                                    <input id="image" type="file" class="form-control" name="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-sm btn-success" type="submit" title="Salvar"><i
                                            class="c-icon c-icon-sm cil-save"></i></button>
                                    <a href="{{ route('sermons.index') }}" class="btn btn-sm btn-primary"
                                        title="Voltar"><i class="c-icon c-icon-sm cil-action-undo"></i></a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header"><strong>Complemento</strong></div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="ccnumber">Date</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <svg class="c-icon">
                                                            <use
                                                                xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-calendar">
                                                            </use>
                                                        </svg>
                                                </div>
                                                <input class="form-control" name="applies_to_date" type="date"
                                                    placeholder="date" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="ccnumber">Categoria</label>
                                            <div class="input-group">
                                                <select class="form-control" name="type">
                                                    @foreach ($category as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="ccnumber">Status</label>
                                            <div class="input-group">
                                                <select class="form-control" name="status_id">
                                                    @foreach ($statuses as $status)
                                                        <option value="{{ $status->id }}">
                                                            {{ $status->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="roles" >Mostrar para</label>
                                            <div class="input-group">
                                                <select class="form-control" id="roles" name="roles[]"
                                                size="6" multiple="">
                                                @foreach ($roles as $roles)
                                                    <option value="{{ $roles->id }}">
                                                        {{ $roles->name }}
                                                    </option>
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
