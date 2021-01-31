@extends('layout.main')

@section('content')


    @include('category.create')

    @foreach ($list as $item)

        @include('category.edit')

    @endforeach

    <div class="col-md-12" align="right" style="margin-bottom: 11px;margin-top: 11px;">
        <a data-toggle="modal" data-target="#create" href="#" class="btn btn-sm btn-primary">+ Category</a>
    </div>


    <div class="col-md-12">
        <table class="table">

            <tr>

                <th>
                    Name
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
                        {{ $item->name }}
                    </td>

                    <td>
                        {{ $item->created_at }}
                    </td>

                    <td>

                        <a href="#" data-toggle="modal" data-target="#edit{{ $item->id }}" class="btn btn-sm btn-warning">Edit</a>

                        <form style="display: inline-block;" onsubmit="return confirm('Do you want to remove this record?');" action="{{ route('category.destroy',[$item->id]) }}" method="post">
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