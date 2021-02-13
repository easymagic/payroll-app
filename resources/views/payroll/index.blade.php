@extends('layout.main')

@section('content')




    @foreach ($list as $item)

        @include('payroll.info')

    @endforeach

    <div class="col-md-12">
        <h3>
            Run Payroll
        </h3>
    </div>

    <div class="col-md-12" align="right" style="margin-bottom: 11px;margin-top: 11px;">
        <form action="{{ route('run.payroll') }}" method="post">
            @csrf
            <div class="col-md-12">
                <input type="month" name="month_year" />
                <button style="margin-top: -4px;" class="btn btn-xs btn-success">Run Payroll</button>
            </div>
        </form>
    </div>


    <div class="col-md-12">
        <table class="table">

            <tr>

                <th>
                    Employee Name
                </th>
                <th>
                    Net-Pay
                </th>
                <th>
                    Month
                </th>
                <th>
                    Year
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
                        {{ $item->type }}
                    </td>

                    <td>
                        {{ $item->value_type }}
                    </td>

                    <td>
                        {{ $item->value }}
                    </td>

                    <td>
                        {{ $item->created_at }}
                    </td>

                    <td>

                        <a href="#" data-toggle="modal" data-target="#edit{{ $item->id }}" class="btn btn-sm btn-warning">Edit</a>

                    </td>

                </tr>

            @endforeach

        </table>
    </div>



@endsection