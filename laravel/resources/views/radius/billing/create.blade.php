@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> <h3>{{ __('Add Money to User') }}</h3></div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('billing.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="user_id"
                                       class="col-md-4 col-form-label text-md-right"><strong>{{ __('User') }}
                                        :</strong>
                                </label>
                                <div class="col-md-6">
                                    @if($users)
                                        <select name="user_id" id="user_id">
                                            <option value="">--Select User--</option>
                                            @foreach($users as $user )
                                                <option value="{{ $user->id }}"
                                                        @if(old('user_id') == $user->id) selected="selected"
                                                    @endif
                                                >{{$user->username}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>


                            </div>


                            <div class="form-group row">
                                <label for="amount"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Amount in Rs.') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="amount"
                                           class="form-control form-control-sm" name="amount"
                                           value="{{ old('amount') }}" autocomplete="amount">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
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
