@extends('components.modal',[
 'action'=>route('user.store'),
 'modal_id'=>'create',
 'modal_header'=>'Add '
])

@section('modal-body')



    <div class="row">


        <div class="col-md-12">
            <label for="">Name</label>
        </div>
        <div class="col-md-12">
            <input name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Name"  />
        </div>

        <div class="col-md-12">
            <label for="">E-mail</label>
        </div>
        <div class="col-md-12">
            <input name="email" type="text" value="{{ old('email') }}" class="form-control" placeholder="E-mail" required />
        </div>


        <div class="col-md-12">
            <label for="">Phone</label>
        </div>
        <div class="col-md-12">
            <input name="phone" type="text" class="form-control" value="{{ old('phone') }}" placeholder="Phone"  />
        </div>

        <div class="col-md-12">
            <label for="">Address</label>
        </div>
        <div class="col-md-12">
            <input name="address" value="{{ old('address') }}" type="text" class="form-control" placeholder="Address"  />
        </div>



        <div class="col-md-12">
            <label for="">Grade</label>
        </div>
        <div class="col-md-12">
            <select name="grade_id" class="form-control" id="">
                <option value="">--Select--</option>
                @foreach ($grades as $grade)
                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                @endforeach
            </select>
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

        <div class="col-md-12" id="logo_container">
            <label for="">
                Passport
                <input name="user_image" type="file" class="form-control" placeholder="Logo"  />
            </label>
        </div>


    </div>

@overwrite

@section('modal-footer')
    <input type="submit" value="Add" class="btn btn-sm btn-success" />
@overwrite
