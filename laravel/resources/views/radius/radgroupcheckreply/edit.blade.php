@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> <h3>{{ __('Edit Group mapping') }}</h3></div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('group-setting.update', $group_setting->id) }}">
                            @csrf
                            @method('PUT')


                            <div class="form-group row">
                                <label for="groupname"
                                       class="col-md-4 col-form-label text-md-right"><strong>{{ __('Group Name') }}
                                        :</strong></label>
                                <div class="col-md-6">
                                    <input id="groupname" type="text" class="form-control form-control-sm"
                                           name="groupname"
                                           value="{{ $group_setting->group->groupname }}" required autocomplete="groupname" autofocus>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="attribute"
                                       class="col-md-4 col-form-label text-md-right"><strong>{{ __('Attributes') }}
                                        :</strong></label>
                                <div class="col-md-6">
                                    @if($attributes)
                                        <select name="attribute" id="attribute">
                                            @foreach($attributes as $attr )
                                                <option value="{{ $attr }}"
                                                        @if($group_setting->attribute == $attr) selected="selected"
                                                    @endif
                                                >
                                                    {{$attr}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="value" class="col-md-4 col-form-label text-md-right">{{__('Value')}}</label>
                                <div class="col-md-6">
                                    <input id="value" type="text" class="form-control form-control-sm"
                                           name="value" value="{{$group_setting->value}}" required autocomplete="value">
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
