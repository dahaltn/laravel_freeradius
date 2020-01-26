@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3 class="d-inline-block">{{ __('Currently Connected customers') }}</h3>
                    </div>
                    <div class="card-body">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                            <form method="GET" action="{{ route('radacct.index') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="search"
                                           class="col-md-3 col-form-label text-md-right"><strong>{{ __('Search By username') }}
                                            :</strong></label>
                                    <div class="col-md-4">
                                        <input id="search" type="text" class="form-control"
                                               name="search"
                                               value="{{ $search }}" autocomplete="search" autofocus>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-md form-control-md btn-outline-dark" type="submit">
                                            Search
                                        </button>
                                        <a href="{{route('radacct.index')}}" class="btn btn-md btn-dark">
                                            Show all
                                        </a>
                                    </div>
                                </div>


                            </form>

                        <table class="table table-responsive-sm">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>UserName</th>
                                <th>Nas Ip</th>
                                <th>Client IP</th>
                                <th>Start time</th>
                                <th>Stop time</th>
                                <th>Downloaded</th>
                                <th>Uploaded</th>
                                <th>Protocol</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($radacct as $acct)
                                <tr>
                                    <td>{{ $acct->radacctid }}</td>
                                    <td>
                                        {{ $acct->username }}
                                        @if(empty($acct->acctstoptime))
                                            <span class="badge badge-success">
                                          Online
                                        </span>
                                        @else
                                            <span class="badge badge-warning">
                                          Offline
                                        </span>
                                        @endif

                                    </td>
                                    <td>{{ $acct->nasipaddress }}</td>
                                    <td>{{ $acct->framedipaddress }}</td>
                                    <td>{{ $acct->acctstarttime}}</td>
                                    <td>{{ $acct->acctstoptime }}</td>
                                    <td><span class="badge badge-primary">{{ $acct->acctoutputoctets_to_mb() }}</span>
                                        MB
                                    </td>
                                    <td><span class="badge badge-primary">{{ $acct->acctinputoctets_to_mb() }}</span> MB
                                    </td>
                                    <td>{{ $acct->framedprotocol }}</td>
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
