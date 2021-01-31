<form action="{{ route('expenditure.store') }}" method="post">
<!-- Modal -->
    @csrf
<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Add Expenditure</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <div class="col-md-12">
                    <label for="">Category</label>
                </div>
                <div class="col-md-12">
                    <select name="category_id" class="form-control">
                        <option value="">--Select--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col-md-12">
                    <label for="">Item Name</label>
                </div>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="item" placeholder="Item Name" />
                </div>

                <div class="col-md-12">
                    <label for="">Item Cost</label>
                </div>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="cost" placeholder="Item Cost" />
                </div>

            </div>


            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>


        </div>

    </div>
</div>
</form>