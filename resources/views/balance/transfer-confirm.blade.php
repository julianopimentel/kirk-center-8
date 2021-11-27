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
            <p><strong>Saldo atual: R$ </strong>{{ number_format($balance->amount, 2, ',','.') }}</p>

            <p><strong>Recebedor: </strong>{{ $sender->name }}</p>               

            <form action="{{ route('transfer.store') }}" method="post">
                {!! csrf_field() !!}

                <input type="hidden" name="sender_id" value="{{ $sender->id }}">

                <div class="form-group">
                    <input type="text" name="valor" class="form-control" placeholder="Valor:">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Transferir</button>
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