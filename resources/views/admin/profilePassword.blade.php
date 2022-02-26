@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header"><strong>Alterar a senha</strong></div>
                        <div class="card-body">
                            <form method="post" action="{{ route('password.update', $user->id) }}">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="Input2">Senha atual</label>
                                    <input type="password" class="form-control" id="Input2" name="old_password">
                                </div>

                                <div class="form-group">
                                    <label for="Input3">Nova senha</label>
                                    <input type="password" class="form-control" id="Input3" name="new_password">
                                </div>

                                <div class="form-group">
                                    <label for="Input4">Confirmação da nova senha</label>
                                    <input type="password" class="form-control" id="Input4" name="password_confirm">
                                </div>

                                <button type="submit" class="btn btn-primary">Salvar</button>
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
