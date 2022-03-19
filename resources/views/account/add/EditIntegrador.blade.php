<!-- Modal Update Transaction-->
<div class="modal fade" id="updateIntegrador{{ $integrador->id }}" tabindex="-1" role="dialog"
    aria-labelledby="updateIntegrador{{ $integrador->id }}Title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateIntegrador{{ $integrador->id }}Title">Editar integrador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('integrador.update', $integrador->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="ccnumber">Documento *</label>
                                <input class="form-control" type="text" value="{{ $integrador->doc }}"
                                    pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}" name="doc">
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="text">Nome do Integrador *</label>
                            <input class="form-control" type="text" value="{{ $integrador->name_company }}"
                                id="name_company" name="name_company" required>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Usuário Integrador *</label>
                            <select class="form-control" disabled>
                            </select>
                        </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>E-mail para contato *</label>
                                <input class="form-control" type="email" value="{{ $integrador->email }}"
                                    name="email">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="text">Contato *</label>
                                <input class="form-control" id="phone" name="phone"
                                    value="{{ $integrador->mobile }}" type="tel">
                                <span id="valid-msg" class="hide">✓ Valid</span>
                                <span id="error-msg" class="hide"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Endereço</label>
                                <input class="form-control" name="address" type="text"
                                    value="{{ $integrador->address1 }}" placeholder="Enter street name"
                                    maxlength="200">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="text">Cidade</label>
                                <input class="form-control" name="city" type="text" value="{{ $integrador->city }}"
                                    placeholder="Enter your city">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>CEP</label>
                                <input class="form-control" name="cep" type="text" value="{{ $integrador->cep }}"
                                    placeholder="69059-627" maxlength="9" pattern="[0-9]{5}-[0-9]{3}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="text">Estado</label>
                                <input class="form-control" name="state" type="text"
                                    value="{{ $integrador->state }}" placeholder="State" placeholder="SP"
                                    maxlength="2">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="text">Country</label>
                                <input class="form-control" name="country" type="text"
                                    value="{{ $integrador->country }}" placeholder="Country name" value="Brazil">
                            </div>
                        </div>
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="text">Inadiplente</label>
                                <label class="c-switch c-switch-label c-switch-pill c-switch-primary c-switch-sm">
                                    <input class="c-switch-input" name="inadiplente" type="checkbox"
                                        {{ $integrador->inadiplente == true ? 'checked' : '' }}><span class="c-switch-slider"
                                        data-checked="&#x2713" data-unchecked="&#x2715"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="text">Licença</label>
                                <input class="form-control" type="number" placeholder="{{ __('License') }}"
                                name="license" value="{{ $integrador->license }}" required autofocus>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit" title="Adicionar"><i
                            class="c-icon c-icon-sm cil-save"></i> Salvar</button>
            </div>

            </form>
        </div>
        <!-- /.row-->
    </div>
</div>
