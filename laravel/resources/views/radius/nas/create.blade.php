@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> <h3>{{ __('Add Nas') }}</h3></div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('nas.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="nasname" class="col-md-4 col-form-label text-md-right">{{ __('NasName') }}</label>

                                <div class="col-md-6">
                                    <input id="nasname" type="text"
                                           class="form-control form-control-sm" name="nasname"
                                           value="{{ old('nasname') }}" required autocomplete="nasname" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="shortname"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Short Name') }}</label>

                                <div class="col-md-6">
                                    <input id="shortname" type="shortname"
                                           class="form-control form-control-sm" name="shortname"
                                           value="{{ old('shortname') }}" autocomplete="shortname">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Nas type') }}</label>

                                <div class="col-md-6">
                                    <input id="type" type="text"
                                           class="form-control form-control-sm" name="type"
                                           value="{{ old('type') }}" autocomplete="type">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="secret" class="col-md-4 col-form-label text-md-right">{{__('Secret')}}</label>

                                <div class="col-md-6">
                                    <input id="secret" type="text" class="form-control form-control-sm"
                                           name="secret" value="{{ old('secret') }}" required autocomplete="secret">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ports" class="col-md-4 col-form-label text-md-right">{{__('Ports')}}</label>

                                <div class="col-md-6">
                                    <input id="ports" type="text" class="form-control form-control-sm"
                                           name="ports" value="{{ old('ports') }}" autocomplete="ports">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="server" class="col-md-4 col-form-label text-md-right">{{__('Server')}}</label>

                                <div class="col-md-6">
                                    <input id="server" type="text" class="form-control @error('server') is-invalid @enderror"
                                           name="server" value="{{ old('server') }}" required autocomplete="server">
                                    @error('server')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="community" class="col-md-4 col-form-label text-md-right">{{__('Community')}}</label>

                                <div class="col-md-6">
                                    <textarea id="community" type="text" class="form-control @error('community') is-invalid @enderror"
                                           name="community" value="{{ old('community') }}" required autocomplete="community">
                                    </textarea>
                                    @error('community')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
