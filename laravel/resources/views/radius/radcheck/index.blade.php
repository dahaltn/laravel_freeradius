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

                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>UserName</th>
                                <th>Attribute</th>
                                <th>op</th>
                                <th>Value</th>
                                <th>Created date</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($radcheck as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->attribute }}</td>
                                    <td>{{ $user->op }}</td>
                                    <td>{{ $user->value }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('radcheck.destroy', $user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-warning" href="{{ route('radcheck.edit',$user->id) }}">Edit</a>
{{--                                            <a class="btn bnt-xs btn-danger" href="{{ route('radcheck.destroy',$user->id) }}">Delete</a>--}}
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
