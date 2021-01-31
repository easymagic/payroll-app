@extends('components.modal',[
 'action'=>route('update.profile',[Auth::user()->id]),
 'modal_id'=>'profile',
 'modal_header'=>'Edit Profile'
])

@section('modal-body')
    <div class="row">

        @method('PUT')


        <div class="col-md-12">
            <label for="">Name</label>
        </div>
        <div class="col-md-12">
            <input name="name" type="text" class="form-control" placeholder="Full Name" value="{{ Auth::user()->name }}" />
        </div>

        <div class="col-md-12">
            <label for="">Phone</label>
        </div>
        <div class="col-md-12">
            <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ Auth::user()->phone }}" />
        </div>
        <div class="col-md-12">
            <label for="">Address</label>
        </div>
        <div class="col-md-12">
            <input name="address" type="text" class="form-control" placeholder="Address" value="{{ Auth::user()->address }}" />
        </div>

        <input type="hidden" name="type" value="{{ Auth::user()->type }}" />



        {{--$user->site_domain = request('site_domain');--}}


    </div>
@overwrite

@section('modal-footer')
    <input name="change_profile" type="submit" value="Save Profile" class="btn btn-sm btn-success" />
@overwrite
