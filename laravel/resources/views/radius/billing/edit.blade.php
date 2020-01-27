@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> <h3>{{ __('Transfer balance') }}</h3></div>
                    <div class="card-body">

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
                        <div class="alert alert-warning text-center"><p>Transfer available balance from this user to other user</p></div>

                        <form method="POST" action="{{ route('billing.update', $billing->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="user_id"
                                       class="col-md-4 col-form-label text-md-right">{{ __('From User:') }}</label>

                                <div class="col-md-6">
                                    <input id="user_id" type="user_id"
                                           class="form-control form-control-sm" name="user_id"
                                           value="{{ $billing->user->username }}" disabled autocomplete="user_id">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="amount"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Available amount Rs:') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="amount"
                                           class="form-control form-control-sm" name="amount"
                                           value="{{ $billing->amount }}" disabled autocomplete="amount">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="transfer_to_user_id"
                                       class="col-md-4 col-form-label text-md-right"><strong>{{ __('Transfer to User:') }}
                                        :</strong>
                                </label>
                                <div class="col-md-6">
                                    @if($users)
                                        <select name="transfer_to_user_id" id="transfer_to_user_id">
                                            <option value="">--Select User--</option>
                                            @foreach($users as $user )
                                                <option value="{{ $user->id }}"
                                                        @if(old('transfer_to_user_id') == $user->id) selected="selected"
                                                    @endif
                                                >{{$user->username}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>


                            </div>


                            <div class="form-group row">
                                <label for="transfer_amount"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Transfer amount:') }}</label>

                                <div class="col-md-6">
                                    <input id="transfer_amount" type="transfer_amount"
                                           class="form-control form-control-sm" name="transfer_amount"
                                           value="{{ old('transfer_amount') }}" autocomplete="transfer_amount">
                                    <em>You can only transfer your available amount</em>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Transfer') }}
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
