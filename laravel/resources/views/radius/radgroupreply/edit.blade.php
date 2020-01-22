@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Edit Group Reply') }}</h3></div>
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

                        <form method="POST" action="{{ route('radgroupreply.update', $radgroupreply->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="groupname"
                                       class="col-md-4 col-form-label text-md-right"><strong>{{ __('Group Name') }}
                                        :</strong></label>
                                <div class="col-md-6">
                                    <input id="groupname" type="text" class="form-control form-control-sm"
                                           name="groupname"
                                           value="{{ $radgroupreply->groupname }}" required autocomplete="groupname" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="attribute"
                                       class="col-md-4 col-form-label text-md-right"><strong>{{ __('Attribute') }}
                                        :</strong></label>
                                <div class="col-md-6">
                                    <input id="attribute" type="text" class="form-control form-control-sm"
                                           name="attribute"
                                           value="{{ $radgroupreply->attribute }}" required autocomplete="attribute"
                                           autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="op" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Op') }}
                                        :</strong></label>
                                <div class="col-md-6">
                                    <input id="op" type="text" class="form-control form-control-sm" name="op"
                                           value="{{ $radgroupreply->op }}" required autocomplete="op" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="value"
                                       class="col-md-4 col-form-label text-md-right"><strong>{{ __('Value') }}
                                        :</strong></label>
                                <div class="col-md-6">
                                    <input id="value" type="text" class="form-control form-control-sm" name="value"
                                           value="{{ $radgroupreply->value }}" required autocomplete="value" autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Update Group Reply') }}
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
