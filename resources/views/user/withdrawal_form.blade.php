@extends('components.modal',[
 'action'=>'',
 'modal_id'=>'withdraw-request-form',
 'modal_header'=>'Withdraw Amount'
])
@section('modal-body')
    <div class="row">



        <div class="col-md-12">
            <label for="">Amount</label>
        </div>
        <div class="col-md-12">
            <input name="amount" id="amount" type="text" class="form-control" placeholder="Type Amount"  />
        </div>

        {{--$new->phone = request('phone');--}}
        {{--$new->address = request('address');--}}

    </div>
@overwrite

@section('modal-footer')
    <input type="submit" value="Withdraw" class="btn btn-sm btn-success" />
@overwrite
