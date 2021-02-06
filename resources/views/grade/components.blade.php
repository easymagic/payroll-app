
    <div id="component{{ $item->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Linked Components</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">



{{--start--}}


                    <div class="col-md-12" align="right" style="margin-bottom: 11px;margin-top: 11px;">
                        <form method="post" action="{{ route('grade_payroll_component.store') }}">

                            @csrf

                            <input type="hidden" name="grade_id" value="{{ $item->id }}" />

                            <div class="form-group">
                                <label for="">
                                    Select Payroll Component
                                </label>
                                <div class="col-md-12">
                                    <select name="payroll_component_id" class="form-control" id="">
                                        @foreach ($components as $component)
                                          <option value="{{ $component->id }}">{{ $component->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <button style="margin-top: 11px;" class="btn btn-sm btn-success">Link Component</button>
                                </div>
                            </div>


                        </form>

                    </div>


                    <div class="col-md-12">
                        <table class="table">

                            <tr>

                                <th>
                                    Payroll Component
                                </th>
                                <th>
                                    Value
                                </th>
                                <th>
                                    Created
                                </th>
                                <th>
                                    Action
                                </th>

                            </tr>


                            @foreach ($item->payroll_components as $item)

                                <tr>

                                    <td>
                                        {{ $item->payroll_component->name }}
                                    </td>

                                    <td>
                                        {{ $item->payroll_component->amount }}
                                    </td>

                                    <td>
                                        {{ $item->created_at }}
                                    </td>

                                    <td>


                                        <form style="display: inline-block;" onsubmit="return confirm('Do you want to remove this record?');" action="{{ route('grade_payroll_component.destroy',[$item->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Remove</button>
                                        </form>
                                    </td>

                                </tr>

                            @endforeach

                        </table>
                    </div>



                    {{--end--}}


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>



