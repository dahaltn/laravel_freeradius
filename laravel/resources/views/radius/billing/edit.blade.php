@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> <h3>{{ __('Edit User cash') }}</h3></div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('billing.update', $billing->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="user_id"
                                       class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>

                                <div class="col-md-6">
                                    <input id="user_id" type="user_id"
                                           class="form-control form-control-sm" name="user_id"
                                           value="{{ $billing->user->username }}" disabled autocomplete="user_id">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="amount"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Amount in Rs.') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="amount"
                                           class="form-control form-control-sm" name="amount"
                                           value="{{ $billing->amount }}" autocomplete="amount">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
