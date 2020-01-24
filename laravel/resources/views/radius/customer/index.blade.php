@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3 class="d-inline-block">{{ __('Radius User') }}</h3>
                        <a href="{{ route('customers.create') }}" class="btn btn-sm btn-primary float-right">Add
                            User</a>
                    </div>
                    <div class="card-body">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <p></p>

                        <table class="table">
                            <thead>

                            <tr>
                                <th>No</th>
                                <th>UserName</th>
                                <th>Password</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($radius_users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->password }}</td>
                                    <td>{{ $user->first_name }} {{$user->last_name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td> {{ $user->mobile}}</td>
                                    <td>{{ $user->address}}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('customers.destroy', $user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-warning"
                                               href="{{ route('customers.edit', $user->id) }}">Edit</a>
                                            <a class="btn btn-sm btn-outline-dark"
                                               href="{{ route('customers.show', $user->id) }}">View Detail</a>
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
