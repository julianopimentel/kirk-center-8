@if (Auth::user()->menuroles == 'admin')
    @extends('layouts.baseminimal')

    @section('content')
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                    <h4><strong>{{ __('account.select') }}</strong></h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped data-table">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Name</th>
                                            <th>Integrador</th>
                                            <th>Inadiplente</th>
                                            <th>Status</th>
                                            <th width="1%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    <script type="text/javascript">
                        $(function() {

                            var table = $('.data-table').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax: "{{ route('account.indexAdmin') }}",
                                columns: [{
                                        data: 'id',
                                        name: 'id',
                                        orderable: true,
                                        searchable: true
                                    },
                                    {
                                        data: 'name_company',
                                        name: 'name_company',
                                        orderable: true,
                                        searchable: true
                                    },
                                    {
                                        data: 'integrador.name_company',
                                        name: 'integrador',
                                        orderable: true,
                                        searchable: true
                                    },
                                    {
                                        data: 'integrador.inadiplente',
                                        name: true,

                                    },
                                    {
                                        data: 'status.name',
                                        name: 'status'
                                    },
                                    {
                                        data: 'action',
                                        name: 'action',
                                        orderable: false,
                                        searchable: false
                                    },
                                ]
                            });

                        });
                    </script>
                @endsection

                @section('javascript')
                @endsection
            @else
                @include('errors.redirecionar')
@endif
