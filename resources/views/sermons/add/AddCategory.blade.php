<!-- Modal Store Transaction-->
<div class="modal fade" id="storyCategory" tabindex="-1" role="dialog" aria-labelledby="storeTransactionTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar nova Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sermons.storeCategory') }}" method="post">
                    {!! csrf_field() !!}
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-12">
                                <label for="ccnumber">Nome *</label>
                                <input class="form-control" type="text" placeholder="{{ __('Title') }}" name="name"
                                    required autofocus>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="text">Descrição *</label>
                            <input class="form-control" type="text" name="body" required autofocus>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="roles">Mostrar para*</label>
                            <div class="input-group">
                                <select class="form-control" id="roles" name="roles[]" size="3" multiple="">
                                    @foreach ($roles as $roles)
                                        <option value="{{ $roles->id }}">
                                            {{ $roles->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="small text-muted">Pressione SHIFT+Click e selecione os grupos
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
