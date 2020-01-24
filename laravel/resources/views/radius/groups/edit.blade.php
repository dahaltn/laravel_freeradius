@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> <h3>{{ __('Edit Group Name') }}</h3></div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('groups.update', $group->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="nasname" class="col-md-4 col-form-label text-md-right">{{ __('Group name') }}</label>

                                <div class="col-md-6">
                                    <input id="groupname" type="text"
                                           class="form-control form-control-sm" name="groupname"
                                           value="{{ $group->groupname }}" required autocomplete="groupname" autofocus>
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Group') }}
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
