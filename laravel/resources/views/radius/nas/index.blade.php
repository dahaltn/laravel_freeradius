@extends('layouts.app')

@section('content')

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h3 class="d-inline-block">{{ __('Nas list') }}</h3>
                        <a href="{{ route('nas.create') }}" class="btn btn-sm btn-primary float-right">Add NAS</a>

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
                                <th>Nas Name</th>
                                <th>ShortName</th>
                                <th>Type</th>
                                <th>Secret</th>
                                <th>Ports</th>
                                <th>Community</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($na as $n)
                                <tr>
                                    <td>{{ $n->id }}</td>
                                    <td>{{ $n->nasname }}</td>
                                    <td>{{ $n->shortname }}</td>
                                    <td>{{ $n->type }}</td>
                                    <td>{{ $n->secret }}</td>
                                    <td>{{ $n->ports }}</td>
                                    <td>{{ $n->community }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('nas.destroy', $n->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-warning" href="{{ route('nas.edit',$n->id) }}">Edit</a>
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                Delete
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            {!! $na->links() !!}

            </div>
    </div>
@endsection
