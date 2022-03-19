<!-- Modal Update Transaction-->
<div class="modal fade" id="updateCategory{{ $category->id }}" tabindex="-1" role="dialog"
    aria-labelledby="updateCategory{{ $category->id }}Title" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCategory{{ $category->id }}Title">Editar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('sermons.updateCategory', $category->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="form-group  col-sm-12">
                            <label for="ccnumber">Nome *</label>
                            <input class="form-control" type="text" value="{{ $category->name }}"
                            name="name" id="name">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="text">Descrição *</label>
                            <input class="form-control" type="text" value="{{ $category->body }}"
                                id="body" name="body" required>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="roles">Mostrar para*</label>
                            <div class="input-group">
                                @php
                                    $selected = explode(",", $category->roles);
                                @endphp
                                <select class="form-control" id="roles" name="roles[]" size="5" multiple="">
                                    @foreach($roles as $supplier)
                                      <option value="{{ $supplier->id }}" {{ (in_array($supplier->id, $selected)) ? 'selected' : '' }}>{{ $supplier->name}}</option>
                                    @endforeach
                                 </select>
                            </div>
                            <div class="small text-muted">Pressione SHIFT+Click e selecione os grupos
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
</div>