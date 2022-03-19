@if ($appPermissao->view_sermons == true)
    @extends('layouts.base')
    @section('content')
    
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4><strong>Categoria</strong></h4>
                            <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#storyCategory"><i
                                    class="c-icon c-icon-sm cil-plus"></i> Categoria</button>
                            @include('sermons.add.AddCategory')
                        </div>
                            <div class="card-body">
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
                                                        <a href="" target="_blank" data-toggle="modal"
                                                            data-target="#updateCategory{{ $category->id }}"><i
                                                                class="c-icon c-icon-sm cil-pencil text-success"></i></a>
                                                        @include('sermons.add.EditCategory')
                                                    @endif
                                                </td>
                                                <td width="1%">
                                                    @if ($appPermissao->delete_sermons == true)
                                                        <form
                                                            action="{{ route('sermons.destroyCategory', $category->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <a class="show_confirm" data-toggle="tooltip"
                                                                title='Delete'><i
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
