@extends('layout.admin')
@section('content')


    @foreach ($list as $item)
        @include('user.edit')
    @endforeach

    @include('user.create')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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


                <div class="col-md-12" align="right" style="margin-bottom: 11px;">
                    <a href="#" data-toggle="modal" data-target="#create" class="btn btn-sm btn-success">+ User</a>
                </div>

                <div class="col-md-12">
                    <table class="table-striped table">
                        <tr>
                            <th>
                                E-mail
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Grade
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Created
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        @foreach ($list as $item)
                            <tr>

                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->email }}
                                </td>
                                <td>
                                    {{ $item->phone }}
                                </td>
                                <td>
                                    {{ $item->grade->name }}
                                </td>
                                <td>
                                    {{ $item->statusName }}
                                </td>

                                <td>
                                    {{ $item->created_at }}
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#edit{{ $item->id }}" class="btn btn-sm btn-info">Edit</a>
                                    <form onsubmit="return confirm('Do you want to confirm this action?')" action="{{ route('user.destroy',[$item->id]) }}" style="display: inline-block" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </table>
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



    </script>

@endsection