<!-- Modal Store Transaction-->
<div class="modal fade" id="storeTransactionEntrada" tabindex="-1" role="dialog"
    aria-labelledby="storeTransactionTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="storeTransactionTitle">Entrada Finaceira</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('deposit.store') }}">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="ccnumber">Pessoa</label>
                                <!--<select class="itemName form-control" id="itemName" name="itemName"></select> -->
                                <select class="form-control" id="itemName" name="itemName">
                                    <option value="">Para a instituição</option>
                                    @foreach ($people as $people)
                                        <option value="{{ $people->id }}">{{ $people->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="text">Tipo *</label>
                            <select class="form-control" id="tipo" name="tipo" required>
                                @foreach ($statusfinanentra as $statusfinanentra)
                                    <option value="{{ $statusfinanentra->id }}">{{ $statusfinanentra->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Forma de Pagamento *</label>
                            <select class="form-control" id="pag" name="pag" required>
                                @foreach ($statuspag as $statuspags)
                                    <option value="{{ $statuspags->id }}">{{ $statuspags->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="ccyear">Data de lançamento *</label>
                            <input class="form-control" id="date_lancamento" type="date" name="date_lancamento"
                                placeholder="date" value="{{ date('Y-m-d') }}" required><span
                                class="help-block">Please enter a valid date</span>
                        </div>
                    </div>
                    <!-- /.row-->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ação</th>
                                <th width="40%">Item</th>
                                <th>Quatidade</th>
                                <th>Preço</th>
                                <th>Taxa</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody class="field_wrapper">
                            <tr class="item">
                                <td>
                                    <a href="javascript:void(0);" class="add_button btn btn-sm btn-primary"
                                        title="Adicionar Item"><i class="c-icon c-icon-sm cil-plus"></i></a>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="product_description[]" class="form-control calcEvent"
                                            id="product_description" placeholder="Descrição" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="quantity[]" value="1"
                                            class="form-control calcEvent quantity" id="quantity" placeholder=""
                                            required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="price[]" class="form-control calcEvent price money"
                                            id="price" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="tax[]" class="form-control calcEvent tax" value="0"
                                            id="tax" placeholder="" required>
                                    </div>
                                </td>
                                <td>
                                    <input type="hidden" name="total[]" class="form-control calcEvent item_total"
                                        placeholder="" required>
                                    <strong class="item_total">0.00</strong>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-8">

                            <label for="ccmonth">Observação</label>
                            <textarea class="form-control" name="observacao" rows="2"
                                placeholder="Content.."></textarea>

                        </div>
                        <div class="col-md-4 text-md">
                            <table class="table">
                                <tr>
                                    <th><strong>Subtotal: </strong></th>
                                    <input type="hidden" name="sub_total" class="sub_total">
                                    <td class="text">{{ $appSystem->currency }} <span
                                            class="sub_total">0.00</span></td>
                                </tr>
                                <tr>
                                    <th><strong>Taxa: </strong></th>
                                    <input type="hidden" name="total_tax" class="total_tax">
                                    <td class="text">{{ $appSystem->currency }} <span
                                            class="total_tax">0.00</span></td>
                                </tr>
                                <tr>
                                    <th><strong>Desconto: </strong></th>
                                    <td class="text">
                                        <div class="form-group">
                                            <input type="number" name="discount" value="0"
                                                class="form-control calcEvent text-md-right input-sm" id="discount"
                                                placeholder="" required style="width: 40%">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" name="valor" class="valor" value="">
                                    <th><strong>Total:</strong></th>
                                    <td class="text">{{ $appSystem->currency }} <span
                                            id="valor">0.00</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit" title="Depositar"><i
                            class="c-icon c-icon-sm cil-plus"></i> Depositar</button>
                </form>
                <!-- /.row-->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.itemName').select2({
        placeholder: 'Selecionar uma pessoa',
        ajax: {
            url: '/select2-autocomplete-people',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>

<script type="text/javascript">
    $(function() {

        //---------------------------------------------------------------
        $(document).on("click change paste keyup", ".calcEvent", function() {
            calculate_total();
        });

        var max_field = 10;
        var add_button = $('.add_button');
        var wrapper = $('.field_wrapper');
        var html_fields =
            '<tr class="item"><td> <a href="javascript:void(0);" class="remove_button btn btn-sm btn-danger" title="Remove field"><i class="c-icon c-icon-sm cil-minus"></i></i></a> </td> <td> <div class="form-group"> <input type="text" name="product_description[]" class="form-control calcEvent" id="product_description" placeholder="Descrição" required> </div> </td> <td> <div class="form-group"> <input type="text" name="quantity[]" value="1" class="form-control calcEvent quantity" id="quantity" placeholder="" required> </div> </td> <td> <div class="form-group"> <input type="text" name="price[]" value="0" class="form-control calcEvent price" id="price" placeholder="" required> </div> </td> <td> <div class="form-group"> <input type="text" name="tax[]" value="0" class="form-control calcEvent tax" id="tax" placeholder="" required> </div> </td> <td> <input type="hidden" name="total[]" class="form-control calcEvent item_total" placeholder="" required><strong class="item_total">0.00</strong> </td> </tr>';

        var x = 1; // 

        $(add_button).click(function() {
            if (x < max_field) {
                x++;
                $(wrapper).append(html_fields);
            }

        });

        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove(); //Remove field html
            x--; //Decrement field counter
        });

    });


    //---------------------------------------------------------------
    function calculate_total() {

        var sub_total = 0;
        var total = 0;
        var amountDue = 0;
        var total_tax = 0;

        $('tr.item').each(function() {
            var quantity = parseFloat($(this).find(".quantity").val());
            var price = parseFloat($(this).find(".price").val());
            var item_tax = $(this).find(".tax").val();

            var item_total = parseFloat(quantity * price) > 0 ? parseFloat(quantity * price) : 0;
            sub_total += parseFloat(price * quantity) > 0 ? parseFloat(price * quantity) : 0;
            total_tax += parseFloat(price * quantity * item_tax / 100) > 0 ? parseFloat(price * quantity *
                item_tax / 100) : 0;

            $(this).find('.item_total').text(item_total.toFixed(2));
            $(this).find('.item_total').val(item_total.toFixed(2));
        });

        var discount = parseFloat($("[name='discount']").val()) > 0 ? parseFloat($("[name='discount']").val()) : 0;
        total += parseFloat(sub_total + total_tax - discount);

        $('.sub_total').text(sub_total.toFixed(2));
        $('.sub_total').val(sub_total.toFixed(2)); // for hidden field

        $('.total_tax').text(total_tax.toFixed(2));
        $('.total_tax').val(total_tax.toFixed(2)); // for hidden field

        $('#valor').text(total.toFixed(2));
        $('.valor').val(total.toFixed(2)); // for hidden field

    }
</script>
