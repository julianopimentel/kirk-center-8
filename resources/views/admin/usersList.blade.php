@extends('layouts.baseminimal')

@section('content')

<div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                  <div class="card-header">
                    <h4>{{ __('Users') }}</h4>
                </div>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>Roles</th>
                            <th>Integrador</th>
                            <th>Update at</th>
                            <th>Termo</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                            <tr>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->menuroles }}</td>
                              <td>
                                @if ($user->master == true)
                                  Sim
                                @else
                                  Não
                                @endif</td>
                              <td>{{ $user->updated_at }}</td>
                              <td>{{ $user->agree }}</td>
                              <td>
                                <a href="{{ url('/users/' . $user->id . '/edit') }}" class="btn btn-block btn-primary">Edit</a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
               
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

