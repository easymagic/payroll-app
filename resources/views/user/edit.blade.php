@extends('components.modal',[
 'action'=>route('user.update',[$item->id]),
 'modal_id'=>'edit' . $item->id,
 'modal_header'=>'Edit ' . ucfirst($type) . '(' . $item->statusName . ')'
])

@section('modal-body')

    @method('PUT')

    {{--<input type="hidden" name="change_profile" value="1" />--}}

    <div class="row">


        <div class="col-md-12">
            <label for="">Name</label>
        </div>
        <div class="col-md-12">
            <input name="name" type="text" class="form-control" placeholder="Name" value="{{ $item->name }}"  />
        </div>


        <div class="col-md-12">
            <label for="">E-mail</label>
        </div>
        <div class="col-md-12">
            <input type="text" readonly disabled class="form-control" placeholder="E-mail" value="{{ $item->email }}"  />
        </div>


        <div class="col-md-12">
            <label for="">Phone</label>
        </div>
        <div class="col-md-12">
            <input name="phone" type="text" class="form-control" placeholder="Phone" value="{{ $item->phone }}"  />
        </div>
        <div class="col-md-12">
            <label for="">Address</label>
        </div>
        <div class="col-md-12">
            <input name="address" type="text" class="form-control" placeholder="Address" value="{{ $item->address }}"  />
        </div>

        <input type="hidden" name="type" value="{{ $item->type }}" />



        @if ($type == 'dispatcher')

            <div class="col-md-12">
                <label for="">Select Ride</label>
            </div>
            <div class="col-md-12">
                <select name="ride_id" id="" class="form-control">
                    <option value="">Select</option>
                    @foreach ($rides as $ride)
                        <option {{ ($ride->id == $item->ride_id)? ' selected ' : '' }} value="{{ $ride->id }}">{{ $ride->name }}</option>
                    @endforeach
                </select>
            </div>


        @endif


        <div style="padding: 0;" class="col-md-12" id="logo_container">
        @if (!empty($item->user_image))
            <div class="col-md-12">
                <img src="{{ asset('uploads/' . $item->user_image) }}" alt="" style="max-width: 27%;border-radius: 50%;border: 4px solid #333;" />
            </div>
        @endif

        <div class="col-md-12">
            <label for="">
                Passport
                <input name="logo" type="file" class="form-control" placeholder="Passport"  />
            </label>
        </div>






            @if ($item->type != 'admin')
            <div class="col-md-12" style="
    padding: 15px;
    background-color: #ccc;
    border: 1px solid #999;
">

                <h6><u>Password Section</u></h6>

                <div class="col-md-12">
                    <label for="">Old Password</label>
                </div>
                <div class="col-md-12">
                    <input name="password_old" type="password" class="form-control" placeholder="Old Password"  />
                </div>

                <div class="col-md-12">
                    <label for="">New Password</label>
                </div>
                <div class="col-md-12">
                    <input name="password0" type="password" class="form-control" placeholder="New Password"  />
                </div>


                <div class="col-md-12">
                    <label for="">Confirm Password</label>
                </div>
                <div class="col-md-12">
                    <input name="password1" type="password" class="form-control" placeholder="New Password"  />
                </div>


            </div>
            @endif






        </div>



    </div>
@overwrite

@section('modal-footer')
    <input type="submit" name="update_user" value="Update {{ ucfirst($item->type) }}" class="btn btn-xs btn-success" />

    <input type="submit" name="enable_account" value="Enable Account " class="btn btn-xs btn-warning" />

    <input type="submit" name="disable_account" value="Disable Account " class="btn btn-xs btn-danger" />

    <input type="submit" name="change_password" value="Change Password " class="btn btn-xs btn-primary" />



@overwrite
