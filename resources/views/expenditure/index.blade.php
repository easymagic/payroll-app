@extends('layout.main')

@section('content')


    @include('expenditure.create')

    @foreach ($list as $item)

        @include('expenditure.edit')

    @endforeach

    <div class="col-md-12" align="right" style="margin-bottom: 11px;margin-top: 11px;">
        <a href="{{ route('expenditure.export') }}" class="btn btn-xs btn-info">Export</a>
        <a data-toggle="modal" data-target="#create" href="#" class="btn btn-sm btn-primary">+ Expenditure</a>
    </div>


    <div class="col-md-12">
        <table class="table">

            <tr>

                <th>
                    Category
                </th>
                <th>
                    Item
                </th>
                <th>
                    Cost
                </th>
                <th>
                    Status
                </th>
                <th>
                    Created
                </th>
                <th>
                    Action
                </th>

            </tr>


            @foreach ($list as $item)

                <tr>

                    <td>
                        {{ $item->category->name }}
                    </td>

                    <td>
                        {{ $item->item }}
                    </td>

                    <td>
                        {{ $item->cost }}
                    </td>

                    <td>
                        {!! $status_badge($item->status,$item->status_name) !!}
                    </td>

                    <td>
                        {{ $item->created_at->diffForHumans() }}
                    </td>


                    <td>

                        <a href="#" data-target="#edit{{ $item->id }}" data-toggle="modal" class="btn btn-sm btn-warning">Edit</a>


                        <form style="display: inline-block;" onsubmit="return confirm('Do you want to remove this record?');" action="{{ route('expenditure.destroy',[$item->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Remove</button>
                        </form>
                    </td>

                </tr>

            @endforeach

        </table>
    </div>



@endsection
