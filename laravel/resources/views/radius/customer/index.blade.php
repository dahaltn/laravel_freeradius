@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3 class="d-inline-block">{{ __('Radius Customer list') }}</h3>
                        <a href="{{ route('customers.create') }}" class="btn btn-sm btn-primary float-right">Add
                            New Customer</a>
                    </div>
                    <div class="card-body">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif


                        <form method="GET" action="{{ route('customers.index') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="search"
                                       class="col-md-3 col-form-label text-md-right"><strong>{{ __('Search By username') }}
                                        :</strong></label>
                                <div class="col-md-4">
                                    <input id="search" type="text" class="form-control"
                                           name="search"
                                           value="{{$search_val}}" autocomplete="search" autofocus>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-md form-control-md btn-outline-dark" type="submit">
                                        Search
                                    </button>
                                    <a href="{{route('customers.index')}}" class="btn btn-md btn-dark">
                                        Show all
                                    </a>
                                </div>
                            </div>


                        </form>

                        <table class="table">
                            <thead>

                            <tr>
                                <th>No</th>
                                <th>UserName</th>
                                <th>Group</th>
                                <th>Full Name</th>
                                {{--<th>Email</th>--}}
                                <th>Mobile</th>
                                <th>City</th>
                                <th>Amount left</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($radius_users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                        @if(isset($user->radusergroup->group->groupname))
                                            @if(strpos(strtolower($user->radusergroup->group->groupname),'disable') !== false || strpos(strtolower($user->radusergroup->group->groupname),'expired') !== false)
                                                <span
                                                    class="badge badge-danger">{{  $user->radusergroup->group->groupname }}</span>
                                            @else
                                                <span
                                                    class="badge badge-success">{{  $user->radusergroup->group->groupname }}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{ $user->fullname()}}</td>
                                    {{--                                    <td>{{ $user->email}}</td>--}}
                                    <td> {{ $user->mobile}}</td>
                                    <td>{{ $user->city}}</td>
                                    <td>Rs.@if(isset($user->billing->amount))
                                            {{ number_format((float)$user->billing->amount, 2, '.', '')}}
                                        @else
                                            0.00
                                        @endif
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('customers.destroy', $user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-warning"
                                               href="{{ route('customers.edit', $user->id) }}">Edit</a>
                                            {{--<a class="btn btn-sm btn-outline-dark"--}}
                                            {{--                                               href="{{ route('customers.show', $user->id) }}">View Detail</a>--}}
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                Delete
                                            </button>

                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $radius_users->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
