@extends('layouts.baseminimal')
@section('content')


<div class="container-fluid">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header">



                                    <div class="col-md-12">
                                        <center>
                                            <h3>Selecionar uma comunidade</h3>
                                        </center>
                                        <form action="{{ route('wizard.search') }}" method="POST"
                                            class="form form-inline">
                                            {!! csrf_field() !!}
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-4">
                                                        <div class="inner">
                                                            <input type="text" id='name' name="name" class="form-control"
                                                                placeholder="Nome">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8 col-md-2 col-lg-2 col-xl-4">
                                                        <div class="box-header">
                                                            <button type="submit" class="btn btn-primary">Pesquisar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="box-body">
                                            <table class="table table-responsive-sm table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Instituição</th>
                                                        <th>E-mail</th>
                                                        <th>Telefone</th>
                                                        <th>Address</th>
                                                        <th>CEP</th>
                                                        <th>Localidade</th>
                                                        <th>Selecionar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($institutions as $institution)
                                                        <tr>
                                                            <td width="30%">{{ $institution->id }} -
                                                                {{ $institution->name_company }}</td>
                                                            <td>{{ $institution->email }}</td>
                                                            <td>{{ $institution->mobile }}</td>
                                                            <td>{{ $institution->address1 }}</td>
                                                            <td>{{ $institution->cep }}</td>
                                                            <td>
                                                                @if ($institution->city && $institution->state != null)
                                                                    {{ $institution->city }} / {{ $institution->state }}
                                                                @elseif($institution->city != null)
                                                                    {{ $institution->city }}
                                                                @elseif($institution->state != null)
                                                                    {{ $institution->state }}
                                                                @elseif($institution->country != null)
                                                                    {{ $institution->country }}
                                                                @endif
                                                            </td>
                                                            <td width="1%">
                                                                <form method="post" action="{{route('tenantWizard',['id' => $institution->tenant]) }}">
                                                                    @method('POST')
                                                                    @csrf
                                                                      <button class="btn btn-primary-outline" data-toggle="modal" data-target=".cd-deskapps"><i class="c-icon c-icon-sm cil-room text-dark"></i></button>
                                                                  </form>
                                                                </td>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row-->
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
                <!-- /.row-->
            </div>
        </div>
        <!-- /.row-->
        <!-- /.col-->
    </div>
    <!-- /.row-->
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function(e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function() {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next()
                    .children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url']"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-primary').trigger('click');
        });
    </script>

@endsection

@section('javascript')

@endsection
