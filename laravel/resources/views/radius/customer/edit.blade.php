@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Edit Customer') }}</h3></div>
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

                        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="border mb-5">
                                <h5 class="toast-header">Login info</h5>

                                <div class="form-group row">
                                    <label for="username"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('User Name') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control form-control-sm"
                                               name="username"
                                               value="{{$customer->username}}" required autocomplete="username"
                                               autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right"><strong>{{ __('Password') }}
                                            :</strong></label>
                                    <div class="col-md-6">
                                        <input id="password" type="text" class="form-control form-control-sm"
                                               name="password"
                                               value="@if(isset($customer->radcheckreply->value)){{ $customer->radcheckreply->value }} @endif"
     required autocomplete="password" autofocus>
</div>
</div>
<div class="form-group row">
<label for="group_id"
class="col-md-4 col-form-label text-md-right"><strong>{{ __('Group') }}
 :</strong>
</label>
<div class="col-md-6">
@if(!empty($groups))
 <select name="group_id" id="group_id">
     <option value="">--Select Group--</option>
     @foreach($groups as $group )
         <option value="{{ $group->id }}"
                 @if(!empty($customer->radusergroup->group_id)
                 && $customer->radusergroup->group_id  == $group->id)
                 selected="selected"
             @endif
         >{{ $group->groupname}}</option>
     @endforeach
 </select>
@endempty
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
                 @if($customer->title == $k) selected="selected"
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
    value="{{ $customer->first_name }}" autocomplete="first_name" autofocus>
</div>
</div>

<div class="form-group row">
<label for="last_name"
class="col-md-4 col-form-label text-md-right"><strong>{{ __('Last Name') }}
 :</strong></label>
<div class="col-md-6">
<input id="last_name" type="text" class="form-control form-control-sm"
    name="last_name"
    value="{{ $customer->last_name }}" autocomplete="last_name" autofocus>
</div>
</div>

<div class="form-group row">
<label for="email"
class="col-md-4 col-form-label text-md-right"><strong>{{ __('Email') }}
 :</strong></label>
<div class="col-md-6">
<input id="email" type="text" class="form-control form-control-sm"
    name="email"
    value="{{ $customer->email }}" autocomplete="email" autofocus>
</div>
</div>

<div class="form-group row">
<label for="mobile"
class="col-md-4 col-form-label text-md-right"><strong>{{ __('Mobile Number') }}
 :</strong></label>
<div class="col-md-6">
<input id="mobile" type="text" class="form-control form-control-sm"
    name="mobile"
    value="{{ $customer->mobile }}" autocomplete="mobile" autofocus>
</div>
</div>

<div class="form-group row">
<label for="phone"
class="col-md-4 col-form-label text-md-right"><strong>{{ __('Phone Number') }}
 :</strong></label>
<div class="col-md-6">
<input id="phone" type="text" class="form-control form-control-sm"
    name="phone"
    value="{{ $customer->phone }}" autocomplete="phone" autofocus>
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
    value="{{ $customer->address }}" autocomplete="address" autofocus>
</div>
</div>


<div class="form-group row">
<label for="city"
class="col-md-4 col-form-label text-md-right"><strong>{{ __('City') }}
 :</strong></label>
<div class="col-md-6">
<input id="city" type="text" class="form-control form-control-sm"
    name="city"
    value="{{ $customer->city }}" autocomplete="city" autofocus>
</div>
</div>


<div class="form-group row">
<label for="district"
class="col-md-4 col-form-label text-md-right"><strong>{{ __('District') }}
 :</strong></label>
<div class="col-md-6">
<input id="district" type="text" class="form-control form-control-sm"
    name="district"
    value="{{ $customer->district }}" autocomplete="district" autofocus>
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
       name="notes" autofocus>{{ $customer->notes }}
</textarea>
</div>
</div>
<div class="border mb-5">
<h5 class="toast-header">Created Date</h5>

<div class="form-group row">
<label for="created_at"
    class="col-md-4 col-form-label text-md-right"><strong>{{ __('Created Date') }}
     :</strong></label>
<div class="col-md-6">
 <input id="district" type="text" class="form-control form-control-sm"
        name="created_at"
        value="{{ $customer->created_at }}" disabled>
</div>
</div>
</div>

<div class="form-group row mb-0">
<div class="col-md-6 offset-md-4">
<button type="submit" class="btn btn-dark">
{{ __('Update Customer') }}
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
