@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-header">
                            <h6>Logs</h6>
                        </div>
                        <div class="box-body">
                            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <br>
                                        <h4>Request:</h4>
                                        <p> </p>
                                        @php
                                            
                                            $jsonobj = $logs->manipulations;
                                            
                                            $obj = json_decode($jsonobj);
                                            
                                            foreach ($obj as $key => $value) {
                                                echo $key . ' => ' . $value . '<br>';
                                            }
                                        @endphp
                                        <br>
                                        <a class="btn btn-primary" href="{{ route('logs.index') }}">Retornar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row-->
            </div>
        </div>
    </div>
    </div>
@endsection

@section('javascript')
@endsection
