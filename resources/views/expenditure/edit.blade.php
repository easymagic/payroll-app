<form action="{{ route('expenditure.update',[$item->id]) }}" method="post">
    <!-- Modal -->
    @csrf
    @method('PUT')
    <div id="edit{{ $item->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Expenditure</h4>
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
                                <option {{ $selected($category->id == $item->category_id) }}  value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-12">
                        <label for="">Item Name</label>
                    </div>
                    <div class="col-md-12">
                        <input value="{{ $item->item }}" class="form-control" type="text" name="item" placeholder="Item Name" />
                    </div>

                    <div class="col-md-12">
                        <label for="">Item Cost</label>
                    </div>
                    <div class="col-md-12">
                        <input value="{{ $item->cost }}" class="form-control" type="text" name="cost" placeholder="Item Cost" />
                    </div>

                </div>




                <div class="modal-footer">
                    <button type="submit" class="btn btn-xs btn-success">Save</button>
                    <input type="submit" name="activate" class="btn btn-xs btn-primary" value="Activate" />
                    <input type="submit" name="deactivate" class="btn btn-xs btn-danger" value="Deactivate" />
                    <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>