@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> <h3>{{ __('Add Money to User') }}</h3></div>
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
                        <div class="alert alert-info text-center">
                            <p>Admin can transfer balance to any other user</p>
                            Note: <em>Admin must have available balance to transfer other user.</em>
                            <br /><em>If you don't have available balance Please add first to transfer.</em>
                        </div>


                        <form method="POST" action="{{ route('billing.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="admin_user"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Your are:') }}</label>

                                <div class="col-md-6">
                                    <input id="admin_user" type="admin_user"
                                           class="form-control form-control-sm" name="admin_user"
                                           value="{{$current_user}} (Online)" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="source_amount"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Your available amount Rs:') }}</label>

                                <div class="col-md-6">
                                    <input id="source_amount" type="source_amount"
                                           class="form-control form-control-sm" name="source_amount"
                                           value="{{$current_user_balance}}" disabled>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="user_id"
                                       class="col-md-4 col-form-label text-md-right"><strong>{{ __('Transfer to:') }}
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
                                       class="col-md-4 col-form-label text-md-right">{{ __('Transfer amount:') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="amount"
                                           class="form-control form-control-sm" name="amount"
                                           value="{{ old('amount') }}" autocomplete="amount">
                                    <em>You can only transfer your available amount Rs {{$current_user_balance}}</em>
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
