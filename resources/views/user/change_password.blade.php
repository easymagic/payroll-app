@extends('components.modal',[
 'action'=>route('change.password',[Auth::user()->id]),
 'modal_id'=>'change-password',
 'modal_header'=>'Change Password'
])
@section('modal-body')
    <div class="row">

        @method('PUT')

        <div class="col-md-12">
            <label for="">Old Password</label>
        </div>
        <div class="col-md-12">
            <input name="old" type="password" class="form-control" placeholder="Old Password"  />
        </div>

        <div class="col-md-12">
            <label for="">New Password</label>
        </div>
        <div class="col-md-12">
            <input type="password" name="new" class="form-control" placeholder="New Password" />
        </div>
        <div class="col-md-12">
            <label for="">Confirm Password</label>
        </div>
        <div class="col-md-12">
            <input name="confirm" type="password" class="form-control" placeholder="Confirm Password" />
        </div>

        {{--$new->phone = request('phone');--}}
        {{--$new->address = request('address');--}}

    </div>
@overwrite

@section('modal-footer')
    <input name="change_password" type="submit" value="Change Password" class="btn btn-sm btn-success" />
@overwrite
