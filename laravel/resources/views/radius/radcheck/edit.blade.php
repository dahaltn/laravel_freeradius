@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Edit User') }}</h3></div>
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

                        <form method="POST" action="{{ route('radcheck.update', $radcheck->id) }}">
                            @csrf
                            @method('PUT')
                            {{--                            {{ method_field('PUT') }}--}}
                            <div class="border mb-5">
                                <h5 class="toast-header">Login info</h5>

                                <div class="form-group row">

                                    <label for="username"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('User Name') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input disabled id="username" type="text" class="form-control form-control-sm"
                                               name="username"
                                               value="{{ $radcheck->username }}" required autocomplete="username"
                                               autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="value"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('Password') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="value" type="text" class="form-control form-control-sm" name="value"
                                               value="{{ $radcheck->value }}" required autocomplete="value" autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="border mb-5">
                                <p class="toast-header"><strong>Personal info</strong></p>

                                <div class="form-group row">
                                    <label for="title"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('Title') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        @if($title)
                                            <select name="title" id="title">
                                                @foreach($title as $k => $value )
                                                    <option value="{{ $k }}"
                                                    @if($radcheck->profile->title == $k)
                                                    selected ="selected"
                                                    @endif
                                                    >
                                                    {{ $value }}
                                                    </option>


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
                                               value="@if ($radcheck->profile->first_name){{ $radcheck->profile->first_name }}@endif"
                                               autocomplete="first_name"
                                               autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="last_name"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('Last Name') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="last_name" type="text" class="form-control form-control-sm"
                                               name="last_name"
                                               value="@if ($radcheck->profile->last_name){{$radcheck->profile->last_name}}@endif"
                                               autocomplete="last_name"
                                               autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('Email') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="email" type="text" class="form-control form-control-sm"
                                               name="email"
                                               value="@if ($radcheck->profile->email){{ $radcheck->profile->email }}@endif"
                                               autocomplete="email" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="mobile"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('Mobile Number') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="mobile" type="text" class="form-control form-control-sm"
                                               name="mobile"
                                               value="@if ($radcheck->profile->mobile){{ $radcheck->profile->mobile }} @endif"
                                               autocomplete="mobile" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('Phone Number') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control form-control-sm"
                                               name="phone"
                                               value="@if ($radcheck->profile->phone){{ $radcheck->profile->phone }}@endif"
                                               autocomplete="phone" autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="border mb-5">
                                <p class="toast-header"><strong>Address</strong></p>
                                <div class="form-group row">
                                    <label for="address"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('Address') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control form-control-sm"
                                               name="address"
                                               value="@if ($radcheck->profile->address){{ $radcheck->profile->address }} @endif"
                                               autocomplete="address" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('City') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="city" type="text" class="form-control form-control-sm"
                                               name="city"
                                               value="@if ($radcheck->profile->city){{ $radcheck->profile->city }} @endif"
                                               autocomplete="city" autofocus>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="district"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('District') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="district" type="text" class="form-control form-control-sm"
                                               name="district"
                                               value="@if ($radcheck->profile->district){{ $radcheck->profile->district }}@endif"
                                               autocomplete="district" autofocus>
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
                                        <textarea id="notes" class="form-control form-control-sm"
                                                  name="notes" rows="6" autofocus>@if ($radcheck->profile->notes){{ $radcheck->profile->notes }}@endif
                                        </textarea>
                                </div>
                            </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update User') }}
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
