<!-- Modal Store Transaction-->
<div class="modal fade" id="storeAddIntegrador" tabindex="-1" role="dialog" aria-labelledby="storeTransactionTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="storeTransactionTitle">Adicionar Integrador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('withdraw.store') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="ccnumber">Documento</label>
                                <input class="form-control" type="text" placeholder="01.452.25/0001-19"
                                    pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}" name="doc">
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="text">Nome do Integrador</label>
                            <input class="form-control" type="text" placeholder="{{ __('Name') }}"
                                id="name_company" name="name_company" required>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Usuário Integrador</label>
                            <select class="form-control" name="user_integrador">
                                @foreach ($users as $users)
                                    <option value="{{ $users->id }}">{{ $users->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>E-mail para contato *</label>
                                <input class="form-control" type="email" placeholder="{{ __('E-Mail Address') }}"
                                    name="email">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="text">Contato</label>
                                <input class="form-control" id="phone" name="phone" type="tel">
                                <span id="valid-msg" class="hide">✓ Valid</span>
                                <span id="error-msg" class="hide"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Endereço</label>
                                <input class="form-control" name="address" type="text" placeholder="Enter street name"
                                    maxlength="200">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="text">Cidade</label>
                                <input class="form-control" name="city" type="text" placeholder="Enter your city">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>CEP</label>
                                <input class="form-control" name="cep" type="text" placeholder="69059-627"
                                    maxlength="9" pattern="[0-9]{5}-[0-9]{3}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="text">Estado</label>
                                <input class="form-control" name="state" type="text" placeholder="State"
                                    placeholder="SP" maxlength="2">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="text">Country</label>
                                <input class="form-control" name="country" type="text" placeholder="Country name"
                                    value="Brazil">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit" title="Adicionar"><i
                            class="c-icon c-icon-sm cil-minus"></i> Adicionar</button>
            </div>

            </form>
        </div>
        <!-- /.row-->
    </div>
</div>
