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
                                      <th>Activity</th>
                                      <th>Type</th>
                                      <th>User</th>
                                      <th>Created at</th>
                                      <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($logs as $log)
                                    <tr>
                                      <td><strong>{{ $log->status_log->description }}</strong> 
                                      <td>{{ $log->type($log->type) }}</td>
                                      <td>{{ $log->user->email }}</td>
                                      <td>{{ $log->created_at }}</td>
                                      <td width="10%">
                                            <a href="{{ route('logs.show', $log->id) }}"><i
                                                    class="c-icon c-icon-sm cil-notes text-primary"></i></a>
                                    </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            {!! $logs->links() !!}
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