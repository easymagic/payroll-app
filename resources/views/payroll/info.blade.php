<form method="post">
    <!-- Modal -->
    <div id="edit{{ $item->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Payroll Detail</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                    <div class="col-md-12">
                        <label for="">Employee Name</label>
                    </div>
                    <div class="col-md-12">
                        <input readonly disabled class="form-control" value="{{ $item->employee->name }}" type="text"  />
                    </div>


                    <div class="col-md-12">
                        <label for="">Gross Pay</label>
                    </div>
                    <div class="col-md-12">
                        <input readonly disabled class="form-control" value="{{ $item->gross_pay }}" type="text"  />
                    </div>


                    <div class="col-md-12">
                        <label for="">Net Pay</label>
                    </div>
                    <div class="col-md-12">
                        <input readonly disabled class="form-control" value="{{ $item->net_pay }}" type="text"  />
                    </div>


                    <div class="col-md-12">
                        <label for="">Allowances</label>
                    </div>
                    <div class="col-md-12">
                        <input readonly disabled class="form-control" value="{{ $item->allowances }}" type="text"  />
                    </div>


                    <div class="col-md-12">
                        <label for="">Deductions</label>
                    </div>
                    <div class="col-md-12">
                        <input readonly disabled class="form-control" value="{{ $item->deductions }}" type="text"  />
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>