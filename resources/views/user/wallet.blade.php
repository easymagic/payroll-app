@extends('layouts.admin')
@section('content')


    @include('user.withdrawal_form')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Wallet <b>$</b></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Wallet</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <!-- Small boxes (Stat box) -->
            <div class="row">



                {{--<div class="col-md-12">--}}
                    {{--<h4>--}}
                        {{--User Wallet--}}
                    {{--</h4>--}}
                {{--</div>--}}


                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header">
                            Summary
                        </div>

                        <div class="card-body">


                            <div class="row">


                                <div class="col-md-4 bg-dark" style="padding: 23px;border: 1px solid #888;">

                                    <h4>
                                        Current Wallet Balance $
                                    </h4>
                                    <div style="font-size: 24px;">
                                        {{ number_format($balance - $confirmedWithdrawal) }}
                                        @if ( ( $balance - $confirmedWithdrawal ) > 0)
                                         <button data-toggle="modal" data-target="#withdraw-request-form" class="btn btn-xs btn-success">Withdraw Amount</button>
                                        @endif
                                    </div>

                                </div>


                                <div class="col-md-4 bg-gradient-warning" style="padding: 23px;border: 1px solid #888;">

                                    <h4>
                                        Pending Balance $
                                    </h4>
                                    <div style="font-size: 24px;">
                                        {{ number_format($pending) }}
                                    </div>


                                </div>


                                <div class="col-md-4 bg-cyan" style="padding: 23px;border: 1px solid #888;">

                                    <h4>
                                        Pending Withdrawals $
                                    </h4>
                                    <div style="font-size: 24px;">
                                        {{ number_format($pendingWithdrawal) }}
                                    </div>


                                </div>



                                <div class="col-md-6" style="margin-top: 30px;">

                                    <h6>
                                        Withdrawal History
                                    </h6>
                                    <div>
                                        <table class="table table-striped bg-success">
                                            <tr>

                                                <th>
                                                    Amount
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>
                                                    Date
                                                </th>

                                            </tr>


                                            @foreach ($withdrawals as $withdrawal)
                                            <tr>

                                                <td>
                                                    {{ $withdrawal->amount }}
                                                </td>
                                                <td>
                                                    {{ $withdrawal->status_name }}
                                                </td>
                                                <td>
                                                    {{ $withdrawal->created_at }}
                                                </td>

                                            </tr>
                                             @endforeach


                                        </table>

                                        <div class="col-md-12">
                                            {{ $withdrawals->links() }}
                                        </div>
                                    </div>

                                </div>



                            </div>


                        </div>


                        <div class="card-footer">

                            <button class="btn btn-xs btn-dark">Referesh Pending Reward</button>

                        </div>

                    </div>


                </div>







            </div>
            <!-- /.row -->


            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection


@section('script')

    <script>


        $('#type-filter').on('change',function(){

            var vl = $(this).val();

            // alert(vl);

            if (vl){
                location.href = `{{ route('filter.add',['user','type','']) }}/${vl}`;
                return;
            }

            location.href = `{{ route('filter.remove',['user','type']) }}`;


        });

        $('#status-filter').on('click',function(){

            if ($(this).is(':checked')){
                location.href = '{{ route('filter.add',['user','status','active']) }}';
                return;
            }

            location.href = '{{ route('filter.add',['user','status','inactive']) }}';

        });

        function User(el){

            var $el = $(el);

            var type = Rx.observable('');


            type.observe(function(vl){


                if (vl == 'vendor'){

                    $el.find('#site_domain_container').show();
                    $el.find('#logo_container').show();
                    $el.find('#integration_container').show();
                    return;

                }

                $el.find('#site_domain_container').hide();
                $el.find('#logo_container').hide();
                $el.find('#integration_container').hide();


            });

            type.set($el.find('#type').val());


            $el.find('#type').on('change',function(){
                type.set($(this).val());
            });

        }


    </script>

@endsection