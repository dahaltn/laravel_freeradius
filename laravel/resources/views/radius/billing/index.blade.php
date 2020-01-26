@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <h3 class="d-inline-block">{{ __('Billing and account') }}</h3>
                    <a href="{{ route('billing.create') }}" class="btn btn-sm btn-primary float-right">Add Money to user</a>

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
                            <th>User</th>
                            <th>Amount Balance</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($billing as $b)
                            <tr>
                                <td>{{ $b->id }}</td>
                                <td>{{ $b->user->username }}</td>
                                <td>Rs.{{ $b->amount }}</td>
                                <td>
                                    <form method="POST" action="{{ route('billing.destroy', $b->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-sm btn-warning" href="{{ route('billing.edit',$b->id) }}">Edit</a>
                                        <button class="btn btn-sm btn-danger" type="submit">
                                            Delete
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $billing->links() !!}
                </div>
            </div>
@endsection
