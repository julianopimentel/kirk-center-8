@extends('dashboard.base')


@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="container">

                        <div class="card-header">
            <h3>Informe o recebedor</h3>
        </div>
        <div class="box-body">    
             <form action="{{ route('confirm.transfer') }}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="sender" class="form-control" placeholder="Informe o nome ou e-mail">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Próxima etapa</button>
                </div>
            </form>
        </div>
    </div>
                        <!-- /.row-->
                        </div>
            </div>
        </div>
    </div>
</div>
@stop