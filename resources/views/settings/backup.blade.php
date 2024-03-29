@if ($appPermissao->add_people == true)
@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="container">

                            <div class="card-header">
                                <h4>Backup</h4>
                            </div>

                            <div class="card-body">
                                @if($people == 0)
                                Você pode baixar o arquivo csv de demonstração aqui:<br>
                                <a class="btn btn-primary" href="{{ url('/public/backup/empty.csv') }} ">Download</a>
                                <br><br>
                                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file" class="form-control">
                                    <br>

                                    <button class="btn btn-success">Importar</button>
                                    @else
                                    <a class="btn btn-info" href="{{ route('export') }}">Export User Data</a>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- /.row-->
    </div>
@endsection

@section('javascript')

@endsection
@else
@include('errors.redirecionar')
@endif
