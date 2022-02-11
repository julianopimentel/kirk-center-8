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
                            <form method="POST" action="{{ route('post.store') }}">
                                @csrf



                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input class="form-control" type="text" placeholder="{{ __('Title') }}"
                                                name="title" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <div class="form-group">
                                            <label>Descrição</label>
                                            <input class="form-control" type="text" placeholder="{{ __('Title') }}"
                                                name="title" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <div class="form-group">
                                            <label for="ccnumber">Permissões</label>
                                            <textarea class="form-control" id='body' name="body" rows="1"
                                            placeholder="Mensagem.."></textarea>
                                        </div>
                                    </div>

                                </div>
                                <button class="btn btn-sm btn-success" type="submit">Criar um novo</button>

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
                                        @if ($appPermissao->edit_sermons == true)
                                            <a href="{{ route('sermons.edit', $category->id) }}"><i
                                                    class="c-icon c-icon-sm cil-pencil text-success"></i></a>
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
