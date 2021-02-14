@extends('layout.main')

@section('content')




    @foreach ($list as $item)

        @include('payroll.info')

    @endforeach

    <div class="col-md-12">
        <h3>
            @if (Auth::user()->type == 'admin')
              Run Payroll
            @else
              Payroll History
            @endif
        </h3>
    </div>

    <div class="col-md-12" align="right" style="margin-bottom: 11px;margin-top: 11px;">

        <form method="get" style="display: inline-block">
            <input type="month" name="month_year" />
            <button class="btn btn-xs btn-primary">Fetch Payroll</button>
        </form>


        @if (Auth::user()->type == 'admin')
        <form action="{{ route('run.payroll') }}" method="post" style="display: inline-block;">
            @csrf
            <div class="col-md-12">
                <input type="month" name="month_year" />
                <button style="margin-top: -4px;" class="btn btn-xs btn-success">Run Payroll</button>
            </div>
        </form>
        @endif

    </div>

{{--    <div class="col-md-12">--}}
{{--    </div>--}}


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
                        {{ $item->employee->name }}
                    </td>
                    <td>
                        {{ $item->net_pay }}
                    </td>

                    <td>
                        {{ $item->getMonthText() }}
                    </td>

                    <td>
                        {{ $item->getYearText() }}
                    </td>

                    <td>
                        {{ $item->created_at }}
                    </td>

                    <td>

                        <a href="#" data-toggle="modal" data-target="#edit{{ $item->id }}" class="btn btn-sm btn-warning">Detail</a>

                    </td>

                </tr>

            @endforeach

        </table>

        <div class="col-md-12">
            <h4>
                Total Net Pay For The Month: ${{ number_format($totalNetPay) }}
            </h4>
        </div>
    </div>



@endsection