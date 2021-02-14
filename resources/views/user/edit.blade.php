@extends('components.modal',[
 'action'=>route('user.update',[$item->id]),
 'modal_id'=>'edit' . $item->id,
 'modal_header'=>'Edit ' . '(' . $item->statusName . ')'
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



        <div class="col-md-12">
            <label for="">Grade</label>
        </div>
        <div class="col-md-12">
            <select name="grade_id" class="form-control" id="">
                <option value="">--Select--</option>
                @foreach ($grades as $grade)
                    <option {{ $selected( $item->grade_id == $grade->id ) }} value="{{ $grade->id }}">{{ $grade->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12">
            <label for="">New Password</label>
        </div>
        <div class="col-md-12">
            <input name="new_password" type="password" class="form-control" placeholder="New Password"   />
        </div>

        <div class="col-md-12">
            <label for="">Confirm Password</label>
        </div>
        <div class="col-md-12">
            <input name="confirm_password" type="password" class="form-control" placeholder="Confirm Password"   />
        </div>



        <div class="col-md-12" style="margin-top: 11px;">
            <label for="">Payroll Breakdown</label>
        </div>

        <div class="col-md-12">

            <table class="table">
                <tr>
                    <th>
                        Component
                    </th>
                    <th>
                        Type
                    </th>
                    <th>
                        Amount
                    </th>
                </tr>

                @foreach ($item->payrollDetail() as $payroll_detail)

                    <tr>
                        <td>
                            {{ $payroll_detail->name }}
                        </td>
                        <td>
                           {{ $payroll_detail->type }}
                        </td>
                        <td>
                            {{ $payroll_detail->value }}
                        </td>
                    </tr>

                @endforeach
            </table>

            <div class="col-md-12" style="text-align: right;">
                <b>
                    Daily Net-Pay : ${{ number_format($item->getSalary())  }}
                </b>
            </div>


        </div>






    </div>
@overwrite

@section('modal-footer')
    <input type="submit" name="update_user" value="Update {{ ucfirst($item->type) }}" class="btn btn-xs btn-success" />

    <input type="submit" name="enable_account" value="Enable Account " class="btn btn-xs btn-warning" />

    <input type="submit" name="disable_account" value="Disable Account " class="btn btn-xs btn-danger" />

    <input type="submit" name="change_password" value="Change Password " class="btn btn-xs btn-primary" />



@overwrite
