@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3 class="d-inline-block">{{ __('Users') }}</h3>
                        <a href="{{ route('radcheck.create') }}" class="btn btn-sm btn-primary float-right">Add User</a>
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
                                {{--<th>Notes</th>--}}
                                {{--<th>Created date</th>--}}
                                <th>Action</th>
                            </tr>
                            {{--<div class="le"></div>--}}
                            </thead>
                            <tbody>
                            @foreach ($radcheck as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->value }}</td>
                                    <td>
                                        @if($user->profile->first_name && $user->profile->last_name)
                                            {{ $user->profile->first_name }} {{$user->profile->last_name}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->profile->email)
                                            {{ $user->profile->email}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->profile->mobile)
                                            {{ $user->profile->mobile}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->profile->address)
                                            {{ $user->profile->address}}
                                        @endif
                                    </td>
                                    {{--<td>--}}
                                        {{--@if($user->profile->note)--}}
                                            {{--{{ $user->profile->note}}--}}
                                        {{--@endif--}}
                                    {{--</td>--}}
{{--                                    <td>{{ $user->created_at }}</td>--}}
                                    <td>
                                        <form method="POST" action="{{ route('radcheck.destroy', $user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-warning"
                                               href="{{ route('radcheck.edit',$user->id) }}">Edit</a>
                                            <a class="btn btn-sm btn-outline-dark"
                                               href="{{ route('radcheck.show',$user->id) }}">View Detail</a>

                                            <button class="btn btn-sm btn-danger" type="submit">
                                                Delete
                                            </button>

                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $radcheck->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
