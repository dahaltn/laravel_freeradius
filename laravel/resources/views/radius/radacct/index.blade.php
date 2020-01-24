@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table table-responsive-sm">
                            <thead>
                            <tr>
                                <th>Rad Acct ID</th>
                                <th>Session ID</th>
                                <th>UserName</th>
                                <th>Group Name</th>
                                <th>Realm</th>
                                <th>Nas IP addr</th>
                                <th>Start Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($radacct as $acct)
                                <tr>
                                    <td>{{ $acct->radacctid }}</td>
                                    <td>{{ $acct->acctsessionid }}</td>
                                    <td>{{ $acct->username }}</td>
                                    <td>{{ $acct->realm }}</td>
                                    <td>{{ $acct->nasipaddress }}</td>
                                    <td>{{ $acct->acctuptime }}</td>
                                    <td>
                                        {{--<a class="btn btn-sm btn-primary" href="{{ route('radacct.show',$acct->id) }}">Show</a>--}}

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $radacct->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
