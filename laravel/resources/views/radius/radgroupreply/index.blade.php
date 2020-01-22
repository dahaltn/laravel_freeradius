@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3 class="d-inline-block">{{ __('Rad Group Reply') }}</h3>
                        <a href="{{ route('radgroupreply.create') }}" class="btn btn-sm btn-primary float-right">Add Rad Group Reply</a>
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
                                <th>Attribute</th>
                                <th>op</th>
                                <th>Value</th>
                                <th>Created date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($radgroupreply as $groupreply)
                                <tr>
                                    <td>{{ $groupreply->id }}</td>
                                    <td>{{ $groupreply->groupname }}</td>
                                    <td>{{ $groupreply->attribute }}</td>
                                    <td>{{ $groupreply->op }}</td>
                                    <td>{{ $groupreply->value }}</td>
                                    <td>{{ $groupreply->created_at }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('radgroupreply.destroy', $groupreply->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-warning" href="{{ route('radgroupreply.edit',$groupreply->id) }}">Edit</a>
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                Delete
                                            </button>

                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $radgroupreply->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
