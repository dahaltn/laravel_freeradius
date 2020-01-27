@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"> <h3>{{ __('Admin Balance transfer') }}</h3></div>
                    <div class="card-body bg-light">
                        <div class="alert alert-warning text-center"><p>Load money to your account to be able to transfer other users.</p></div>
                        <div class="alert alert-info text-center"><p>Your current balance is: <strong>Rs {{ \Illuminate\Support\Facades\Auth::user()->amount() }}</strong></p></div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('billing.transfer') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('Current User') }}</label>

                                <div class="col-md-6">
                                    <input id="user" type="text"
                                           class="form-control form-control-sm" name="user"
                                           value="{{ \Illuminate\Support\Facades\Auth::user()->username }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="text"
                                           class="form-control form-control-sm" name="amount"
                                           value="{{ old('amount') }}" required autocomplete="amount" autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Amount') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary"> <h3>{{ __('Daily rate setting') }}</h3></div>
                    <div class="card-body">
                        <div class="alert alert-info text-center"><p>Current Daily  rate setting to charge client.</p></div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('billing.transfer') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="daily_rate" class="col-md-4 col-form-label text-md-right">{{ __('Current Daily Rate') }}</label>

                                <div class="col-md-6">
                                    <input id="daily_rate" type="text"
                                           class="form-control form-control-sm" name="daily_rate"
                                           value="Rs {{ $daily_rate}}" disabled>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
