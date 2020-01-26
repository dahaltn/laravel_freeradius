@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Add Radius User') }}</h3></div>
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

                        <form method="POST" action="{{ route('customers.store') }}">
                            @csrf
                            <div class="border mb-5">
                                <h5 class="toast-header">Login info</h5>

                                <div class="form-group row">
                                    <label for="username"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('User Name') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control form-control-sm"
                                               name="username"
                                               value="{{ old('username') }}" required autocomplete="username" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('Password') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="password" type="text" class="form-control form-control-sm" name="password"
                                               value="{{old('password')}}" required autocomplete="password" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="group_id"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('Group') }}
                                            :</strong>
                                    </label>
                                    <div class="col-md-6">
                                        @if($groups)
                                            <select name="group_id" id="group_id">
                                                <option value="">--Select Group--</option>
                                                @foreach($groups as $group )
                                                    <option value="{{ $group->id }}"
                                                            @if(old('group_id') == $group->id) selected="selected"
                                                        @endif
                                                    >{{$group->groupname}}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="border mb-5">
                                <h5 class="toast-header">Personal info</h5>

                                <div class="form-group row">
                                    <label for="title"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('Title') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        @if($titles)
                                            <select name="title" id="title">
                                                @foreach($titles as $k => $value )
                                                    <option value="{{ $k }}"
                                                            @if(old('title') == $k) selected="selected"
                                                        @endif
                                                    >
                                                        {{$value}}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="first_name"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('First Name') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="first_name" type="text" class="form-control form-control-sm"
                                               name="first_name"
                                               value="{{ old('first_name') }}" autocomplete="first_name" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="last_name"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('Last Name') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="last_name" type="text" class="form-control form-control-sm"
                                               name="last_name"
                                               value="{{ old('last_name') }}" autocomplete="last_name" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('Email') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="email" type="text" class="form-control form-control-sm"
                                               name="email"
                                               value="{{ old('email') }}" autocomplete="email" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="mobile"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('Mobile Number') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="mobile" type="text" class="form-control form-control-sm"
                                               name="mobile"
                                               value="{{ old('mobile') }}" autocomplete="mobile" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('Phone Number') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control form-control-sm"
                                               name="phone"
                                               value="{{ old('phone') }}" autocomplete="phone" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="border mb-5">
                                <h5 class="toast-header">Address</h5>

                                <div class="form-group row">
                                    <label for="address"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('Address') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control form-control-sm"
                                               name="address"
                                               value="{{ old('address') }}" autocomplete="address" autofocus>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="city"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('City') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="city" type="text" class="form-control form-control-sm"
                                               name="city"
                                               value="{{ old('city') }}" autocomplete="city" autofocus>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="district"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('District') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="district" type="text" class="form-control form-control-sm"
                                               name="district"
                                               value="{{ old('district') }}" autocomplete="district" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="border mb-5">
                                <h5 class="toast-header">Other info</h5>

                                <div class="form-group row">
                                    <label for="notes"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('Notes') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <textarea id="notes" class="form-control form-control-sm" rows="6"
                                                  name="notes" autofocus>{{ old('notes') }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Add User') }}
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
