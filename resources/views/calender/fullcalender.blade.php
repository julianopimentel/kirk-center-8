@if ($appPermissao->view_calendar == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-7 col-xl-7">
                        <div class="card">
                            <div class="card-header">
                                <h4>Calendário</h4>
                            </div>
                            <div id='calendar'></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
                        <div class="card">
                            <div class="card-header"><strong>Histórico</strong> <small> últimos agendamentos</small>
                                <div class="col-2">
                                    @if ($appPermissao->add_calendar == true)
                                        <button class="btn btn-primary" type="submit" data-toggle="modal"
                                            data-target="#storeTransactionEntrada"><i
                                                class="c-icon c-icon-sm cil-plus"></i></button>
                                        @include('calender.create')
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('Titulo') }}</th>
                                                        <th>{{ __('Inicio') }}</th>
                                                        <th>{{ __('Fim') }}</th>
                                                        <th colspan="2">
                                                            <Center>{{ __('account.action') }}</Center>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($eventos as $evento)
                                                        <tr>
                                                            <td>{{ $evento->title }}</td>
                                                            <td>{{ $evento->start }}</td>
                                                            <td>{{ $evento->end }}</td>
                                                            <td width="1%">
                                                                @if ($appPermissao->edit_calendar == true)
                                                                    <a href="{{ route('calender.edit', $evento->id) }}"><i
                                                                            class="c-icon c-icon-lg cil-calendar-check text-primary"></i></a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {!! $eventos->links() !!}
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row-->
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {

                        var SITEURL = "{{ url('/') }}";

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        var calendar = $('#calendar').fullCalendar({
                            editable: false,
                            events: SITEURL + "/calender",
                            displayEventTime: false,
                            eventRender: function(event, element, view) {
                                if (event.allDay === 'true') {
                                    event.allDay = true;
                                } else {
                                    event.allDay = false;
                                }
                            },
                            selectable: false,
                            selectHelper: false,
                            select: function(start, end, allDay) {
                                var title = prompt('Event Title:');
                                if (title) {
                                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                                    $.ajax({
                                        url: SITEURL + "/fullcalenderAjax",
                                        data: {
                                            title: title,
                                            start: start,
                                            end: end,
                                            type: 'add'
                                        },
                                        type: "POST",
                                        success: function(data) {
                                            displayMessage("Event Created Successfully");

                                            calendar.fullCalendar('renderEvent', {
                                                id: data.id,
                                                title: title,
                                                start: start,
                                                end: end,
                                                allDay: allDay
                                            }, true);

                                            calendar.fullCalendar('unselect');
                                        }
                                    });
                                }
                            },
                            eventDrop: function(event, delta) {
                                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                                $.ajax({
                                    url: SITEURL + '/fullcalenderAjax',
                                    data: {
                                        title: event.title,
                                        start: start,
                                        end: end,
                                        id: event.id,
                                        type: 'update'
                                    },
                                    type: "POST",
                                    success: function(response) {
                                        displayMessage("Event Updated Successfully");
                                    }
                                });
                            }
                        });

                    });

                    function displayMessage(message) {
                        toastr.success(message, 'Event');
                    }
                </script>
            @endsection


            @section('javascript')
            @endsection
        @else
            @include('errors.redirecionar')
@endif
