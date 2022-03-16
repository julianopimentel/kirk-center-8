<!-- Modal Store Transaction-->
<div class="modal fade" id="storeAddIntegrador" tabindex="-1" role="dialog" aria-labelledby="storeTransactionTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="storeTransactionTitle">Lançamento Finaceiro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('transactions.store') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="ccnumber">Integrador</label>
                                <select class="form-control" name="user_id_integrador">
                                    @foreach ($integrador as $integrador)
                                        <option value="{{ $integrador->id }}">{{ $integrador->name_company }} | {{ $integrador->license }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="text">Tipo</label>
                            <select class="form-control" name="type">
                                <option value="1">Normal
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Quantidade</label>
                            <input class="form-control" type="number" name="quantity">
                        </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Observação</label>
                                <input class="form-control" type="text" name="note">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Total</label>
                                <input class="form-control" type="number" name="total" maxlength="200">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit" title="Adicionar"><i
                            class="c-icon c-icon-sm cil-plus"></i> Adicionar</button>
            </div>

            </form>
        </div>
        <!-- /.row-->
    </div>
</div>
