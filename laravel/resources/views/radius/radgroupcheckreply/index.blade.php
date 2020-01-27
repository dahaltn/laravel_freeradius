@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <h3 class="d-inline-block">{{ __('Group mapping') }}</h3>
                    <a href="{{ route('group-setting.create') }}" class="btn btn-sm btn-primary float-right">Add Group settings</a>

                </div>
                <div class="card-body">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Groupname</th>
                            <th>Attribute</th>
                            <th>Value</th>
                            <th>Type (Check Or Reply)</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($group_settings as $gs)
                            <tr>
                                <td>{{ $gs->id }}</td>
                                <td>{{ $gs->group->groupname }}</td>
                                <td>{{ $gs->attribute }}</td>
                                <td>{{ $gs->value }}</td>
                                <td>{{ $gs->check_reply }}</td>
                                <td>
                                    <form method="POST" action="{{ route('group-setting.destroy', $gs->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-sm btn-warning" href="{{ route('group-setting.edit',$gs->id) }}">Edit</a>
                                        <button class="btn btn-sm btn-danger" type="submit">
                                            Delete
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $group_settings->links() !!}

                </div>
            </div>
@endsection
