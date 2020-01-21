@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3 class="d-inline-block">{{ __('Rad check group') }}</h3>
                        <a href="{{ route('radgroupcheck.create') }}" class="btn btn-sm btn-primary float-right">Add RadGroup</a>
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
                            @foreach ($radgroup as $group)
                                <tr>
                                    <td>{{ $group->id }}</td>
                                    <td>{{ $group->groupname }}</td>
                                    <td>{{ $group->attribute }}</td>
                                    <td>{{ $group->op }}</td>
                                    <td>{{ $group->value }}</td>
                                    <td>{{ $group->created_at }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('radgroupcheck.destroy', $group->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-warning" href="{{ route('radgroupcheck.edit',$group->id) }}">Edit</a>
                                            {{--                                            <a class="btn bnt-xs btn-danger" href="{{ route('radcheck.destroy',$group->id) }}">Delete</a>--}}
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                Delete
                                            </button>

                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $radgroup->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
