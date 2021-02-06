<form action="{{ route('payroll_component.update',[$item->id]) }}" method="post">
    <!-- Modal -->
    @csrf
    @method('PUT')
    <div id="edit{{ $item->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Payroll Component</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="col-md-12">
                        <label for="">Name</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" value="{{ $item->name }}" type="text" name="name" placeholder="Name" />
                    </div>

                    <div class="col-md-12">
                        <label for="">Type</label>
                    </div>
                    <div class="col-md-12">
                        <select name="type" class="form-control" id="">
                            <option {{ $selected($item->type == 'amount') }} value="allowance">Allowance</option>
                            <option {{ $selected($item->type == 'deduction') }} value="deduction">Deduction</option>
                        </select>
                    </div>


                    <div class="col-md-12">
                        <label for="">Value Type</label>
                    </div>
                    <div class="col-md-12">
                        <select name="value_type" class="form-control" id="">
                            <option {{ $selected($item->type == 'amount') }} value="amount">Amount</option>
                            <option {{ $selected($item->type == 'percentage') }} value="percentage">Percentage</option>
                        </select>
                    </div>


                    <div class="col-md-12">
                        <label for="">Value</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" value="{{ $item->value }}"  type="text" name="value" placeholder="Value" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>