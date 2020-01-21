@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3 class="d-inline-block">{{ __('Last Activities') }}</h3>
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
                                <th>Id</th>
                                <th>UserName</th>
                                <th>Pass</th>
                                <th>reply</th>
                                <th>Auth Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($radpostauth as $postauth)
                                <tr>
                                    <td>{{ $postauth->id }}</td>
                                    <td>{{ $postauth->username }}</td>
                                    <td>{{ $postauth->pass }}</td>
                                    <td>{{ $postauth->reply }}</td>
                                    <td>{{ $postauth->authdate }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('radpostauth.show',$postauth->id) }}">Show</a>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $radpostauth->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
