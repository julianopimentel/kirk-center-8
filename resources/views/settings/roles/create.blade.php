@if ($appPermissao->settings_roles == true)
@extends('layouts.base')
@section('content')
<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Criar novo grupo de permissão</h4></div>
            <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                <form method="POST" action="{{ route('roles.store') }}">
                    @csrf
                    <table class="table table-bordered datatable">
                        <tbody>
                            <tr>
                                <th>
                                    Nome
                                </th>
                                <td>
                                    <input class="form-control" name="name" type="text"/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-success" type="submit" title="Salvar"><i
                      class="c-icon c-icon-sm cil-save"></i></button>
              <a class="btn btn-primary" href="{{ route('roles.index') }}" title="Voltar"><i
                      class="c-icon c-icon-sm cil-action-undo"></i></a>
                </form>
            </div>
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