@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6 ">
                                <table class="table table-striped table-success">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th colspan="2"><h5>Connection info</h5></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <strong>Total users:</strong>
                                        </td>
                                        <td>
                                            <strong><span class="badge badge-primary">{{ $users }}</span></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Online users:</strong>
                                        </td>
                                        <td>
                                            <strong><span class="badge badge-success">{{ $online_users }}</span></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <strong>Disabled users:</strong>
                                        </th>
                                        <td>
                                            <strong><span class="badge badge-danger">{{ $disabled_users }}</span></strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 ">
                                <table class="table table-bordered table-primary">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th colspan="2"><h5>Data Uses info</h5></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            Total Downloaded data today:
                                        </td>
                                        <td>
                                            <h5><span class="badge badge-primary">{{ $data_uses_today }} MB</span></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Total Access Denied Today:
                                        </td>
                                        <td>
                                            <h5><span class="badge badge-primary">{{ $access_denied }}</span></h5>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
