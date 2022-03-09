@if ($appPermissao->view_sermons == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="fade-in">
                <div class="card">
                    <div class="card-header">
                        <div class="form-groups row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h4>Categoria</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('sermons.storeCategory') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-sm-3">
                                        <div class="form-group">
                                            <label>Nome*</label>
                                            <input class="form-control" type="text" placeholder="{{ __('Title') }}"
                                                name="name" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="form-group">
                                            <label>Descrição*</label>
                                            <input class="form-control" type="text"
                                                name="body" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="roles">Mostrar para*</label>
                                            <div class="input-group">
                                                <select class="form-control" id="roles" name="roles[]" size="3" multiple="">
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
                                <button class="btn btn-sm btn-success" type="submit">Criar categoria</button>
                        </div>
                        </form>

                    </div>
                    </form>


                    <table class="table table-responsive-sm table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Resumo</th>
                                <th colspan="3">
                                    <Center>{{ __('account.action') }}</Center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorys as $category)
                                <tr>
                                    <td><strong>{{ $category->name }}</strong></td>
                                    <td>{{ $category->body }}</td>
                                    <td width="1%">
                                        @if ($appPermissao->edit_sermons1 == true)
                                            <a href="{{ route('sermons.edit', $category->id) }}"><i
                                                    class="c-icon c-icon-sm cil-pencil text-success"></i></a>
                                        @endif
                                    </td>
                                    <td width="1%">
                                        @if ($appPermissao->delete_sermons == true)
                                            <form action="{{ route('sermons.destroyCategory', $category->id) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a class="show_confirm" data-toggle="tooltip" title='Delete'><i
                                                        class="c-icon c-icon-sm cil-trash text-danger"></i></a>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

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
