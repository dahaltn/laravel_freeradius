@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3 class="d-inline-block">{{ __('Group list') }}</h3>
                        <a href="{{ route('groups.create') }}" class="btn btn-sm btn-primary float-right">Add Group Name</a>
                    </div>
                    <div class="card-body">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table table-responsive-sm">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Group Name</th>
                                <th>Created date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($groups as $group)
                                <tr>
                                    <td>{{ $group->id }}</td>
                                    <td>{{ $group->groupname }}</td>
                                    <td>{{ $group->created_at }}</td>
                                    <td>
                                            <a class="btn btn-sm btn-warning" href="{{ route('groups.edit', $group->id) }}">Edit</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $groups->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
