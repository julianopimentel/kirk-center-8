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
                                    <div class="row">
                                        <a href="{{ route('calender.create') }}"
                                            class="btn btn-primary">{{ __('Adicionar') }}</a>
                                    </div>
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
                                                @foreach ($eventos as $eventos)
                                                    <tr>
                                                        <td>{{ $eventos->title }}</td>
                                                        <td>{{ $eventos->start }}</td>
                                                        <td>{{ $eventos->end }}</td>
                                                        <td width="1%">
                                                            @if ($appPermissao->edit_calendar == true)
                    
                                                                <a href="{{ route('calender.edit', $eventos->id) }}"><i
                                                                        class="c-icon c-icon-sm cil-pencil text-success"></i></a>
                    
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
                        editable: true,
                        events: SITEURL + "/calender",
                        displayEventTime: false,
                        editable: true,
                        eventRender: function(event, element, view) {
                            if (event.allDay === 'true') {
                                event.allDay = true;
                            } else {
                                event.allDay = false;
                            }
                        },
                        selectable: true,
                        selectHelper: true,
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
                        },
                        eventClick: function(event) {
                            var deleteMsg = confirm("Do you really want to delete?");
                            if (deleteMsg) {
                                $.ajax({
                                    type: "POST",
                                    url: SITEURL + '/fullcalenderAjax',
                                    data: {
                                        id: event.id,
                                        type: 'delete'
                                    },
                                    success: function(response) {
                                        calendar.fullCalendar('removeEvents', event.id);
                                        displayMessage("Event Deleted Successfully");
                                    }
                                });
                            }
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