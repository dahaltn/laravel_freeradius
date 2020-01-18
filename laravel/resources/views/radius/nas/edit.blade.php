@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> <h3>{{ __('Add Nas') }}</h3></div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{route('nas.update', $na->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="nasname" class="col-md-4 col-form-label text-md-right">{{ __('Nas Name') }}</label>

                                <div class="col-md-6">
                                    <input id="nasname" type="text" class="form-control form-control-sm" name="nasname"
                                           value="{{ $na->nasname }}" required autocomplete="nasname" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="shortname" class="col-md-4 col-form-label text-md-right">{{ __('Short Name') }}</label>

                                <div class="col-md-6">
                                    <input id="shortname" type="text" class="form-control form-control-sm" name="shortname"
                                           value="{{ $na->shortname }}" autocomplete="shortname" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Nas Type') }}</label>

                                <div class="col-md-6">
                                    <input id="type" type="text" class="form-control form-control-sm" name="type"
                                           value="{{ $na->type }}" autocomplete="type" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="secret" class="col-md-4 col-form-label text-md-right">{{ __('Nas Secret') }}</label>

                                <div class="col-md-6">
                                    <input id="secret" type="text" class="form-control form-control-sm" name="secret"
                                           value="{{ $na->secret }}" required autocomplete="secret" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ports" class="col-md-4 col-form-label text-md-right">{{ __('Ports') }}</label>

                                <div class="col-md-6">
                                    <input id="ports" type="text" class="form-control form-control-sm" name="ports"
                                           value="{{ $na->ports }}" autocomplete="ports" autofocus>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="server" class="col-md-4 col-form-label text-md-right">{{ __('Nas Server') }}</label>

                                <div class="col-md-6">
                                    <input id="server" type="text" class="form-control form-control-sm" name="server"
                                           value="{{ $na->server }}" autocomplete="server">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="community" class="col-md-4 col-form-label text-md-right">{{ __('Nas Community') }}</label>

                                <div class="col-md-6">
                                    <textarea id="community" type="text" class="form-control form-control-sm" name="community"
                                           value="{{ $na->community }}">
                                    </textarea>
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
