@extends('layouts.base')
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    
                      <div class="card-header"><h6>Logs</h6></div>
                        <div class="box-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Activity</th>
                                      <th>Type</th>
                                      <th>User</th>
                                      <th>Data</th>
                                      <th>Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($peoples as $people)
                                    <tr>
                                      <td style="width:1%;"><strong>{{ $people->id }}</strong> 
                                      <td><strong>{{ $people->status_log->description }}</strong> 
                                      <td>{{ $people->type($people->type) }}</td>
                                      <td>{{ $people->user->email }}</td>
                                      <td><button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="{{ $people->manipulations }}">
                                          +Info
                                        </button></td>
                                      <td>{{ $people->created_at }}</td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            {!! $peoples->links() !!}
                        </div>
                    </div>
                </div>
                <!-- /.row-->
            </div>
        </div>
    </div>
</div>
<script>
  $("#name").on("input", function(){
    $(this).val($(this).val().toUpperCase());
});
</script>
@endsection

@section('javascript')

@endsection