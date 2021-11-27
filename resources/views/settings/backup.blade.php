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
                                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if($people == 0)
                                    <input type="file" name="file" class="form-control">
                                    <br>
                                    You can download demo csv file from here: CSV File.<br>
                                    <a class="btn btn-dark" href="{{ url('/public/backup/empty.csv') }} ">Download</a>
                                    <br><br>
                                    <button class="btn btn-success">Import User Data</button>
                                    @endif
                                    <a class="btn btn-info" href="{{ route('export') }}">Export User Data</a>
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
