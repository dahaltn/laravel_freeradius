@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <h3 class="d-inline-block">{{ __('Balance Transfer History') }}</h3>
                    <a href="{{ route('billing.index') }}" class="btn btn-sm btn-outline-dark float-right">Go to user balance list</a>

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
                            <th>Transferred Amount </th>
                            <th>Transferred To</th>
                            <th>Transferred from and (Remaining balance)</th>
                            {{--<th>Amount Remaining</th>--}}
                            <th>Transferred Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($transactions as $t)
                            <tr>
                                <td>{{ $t->id }}</td>
                                <td>Rs.{{ $t->transfer_amount }}</td>
                                <td>{{ $t->transfer_to_user->username }}</td>
                                <td>
                                    {{ $t->transfer_from_user->username}}
                                (<span class="badge badge-dark">Rs {{ $t->remain_after_transfer}}</span>)
                                </td>
                                {{--<td></td>--}}
                                <td>{{ $t->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {!! $transactions->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
