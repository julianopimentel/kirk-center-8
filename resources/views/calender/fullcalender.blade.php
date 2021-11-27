@if ($appPermissao->view_calendar == true)
@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Calender</h4>
                        </div>

                        <div id='calendar'></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <!--<div class="card">
                        <div class="card-header"><strong>Adicionar agendamento</strong> <small>detalhado</small></div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label for="name">Titulo</label>
                                <input class="form-control" id="name" type="text" placeholder="Enter your name">
                              </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-sm-12">
                                 <label for="ccyear">Inicio</label>
                                  <input class="form-control" name="birth_at" type="date" placeholder="date">
                              </div>
                              <div class="col-sm-12">
                                 <label for="ccyear">Fim</label>
                                  <input class="form-control" name="birth_at" type="date" placeholder="date">
                            </div>
                          </div>
                        </div>
                      </div>/.row-->
                    <div class="card">
                        <div class="card-header"><strong>Histórico</strong> <small>últimos agendamentos</small></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('Titulo') }}</th>
                                                    <th>{{ __('Start') }}</th>
                                                    <th>{{ __('End') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($eventos as $eventos)
                                                    <tr>
                                                        <td>{{ $eventos->title }}</td>
                                                        <td>{{ $eventos->start }}</td>
                                                        <td>{{ $eventos->end }}</td>
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
                                var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                                var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
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