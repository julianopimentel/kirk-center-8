@if ($appPermissao->add_prayer == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><strong>Pedido de Oração</strong></div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('prayer.store') }}" role="form"
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
                                                <label>Mensagem</label>
                                                <textarea class="form-control" id="textarea-input" name="content"
                                                    rows="20" placeholder="{{ __('Content..') }}" required></textarea>
                                            </div>
                                            <!-- /.row-->
                                            <div class="row">
                                                @if ($appPermissao->edit_prayer == true)
                                                <div class="form-group col-sm-3">
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
                                                <div class="form-group col-sm-2">
                                                    <div class="form-group">
                                                        <label for="ccnumber">Type</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="text"
                                                                placeholder="{{ __('Note type') }}" name="note_type"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="form-group col-sm-2">
                                                    <div class="form-group">
                                                        <label for="public">Público</label>
                                                        <div class="input-group">
                                                            <label
                                                                class="c-switch c-switch-label c-switch-pill c-switch-primary">
                                                                <input class="c-switch-input" name="public"
                                                                    type="checkbox"><span class="c-switch-slider"
                                                                    data-checked="&#x2713" data-unchecked="&#x2715"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-success" type="submit" title="Salvar"><i
                                                class="c-icon c-icon-sm cil-save"></i></button>
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
