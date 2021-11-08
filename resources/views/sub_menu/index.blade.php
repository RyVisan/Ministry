@extends('daskboard')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <a href="{{route('sub_menu.create')}}" class="btn btn-primary"><i class="nav-icon fas fa-plus"></i> <span style="font-family: 'Siemreap', cursive;">បង្កើតSubមីនុយថ្មី</span></a>
                    </h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><span style="font-family: 'Siemreap', cursive;">{{session('success')}}</span></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header"><h3><span style="font-family: 'Siemreap', cursive;">បញ្ជីSubមីនុយ</span></h3></div>
                            <div class="card-body">
                                <table id="table_id" class="display">
                                    <thead>
                                    <tr style="font-family: 'Siemreap', cursive; text-align: center">
                                        <th style="text-align: center">ល.រ</th>
                                        <th style="text-align: center">ឈ្មោះមីនុយ</th>
                                        <th style="text-align: center">ឈ្មោះSubមីនុយ</th>
                                        <th style="text-align: center">ការតម្រៀប</th>
                                        <th style="text-align: center;">បានបង្កើត</th>
                                        <th style="text-align: center;">ស្ថានភាព</th>
                                        <th style="text-align: center;">មុខងារ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sub_menus as $key=>$sub_menu)
                                        <tr>
                                            <th scope="row" style="text-align: center; width: 100px;">{{$key+1}}</th>
                                            <td style="font-family: 'Siemreap', cursive;">{{$sub_menu->menu->name}}</td>
                                            <td style="font-family: 'Siemreap', cursive;">{{$sub_menu->name}}</td>
                                            <td style="font-family: 'Siemreap', cursive; text-align: center;">{{$sub_menu->order_by}}</td>
                                            <td style="text-align: center;">{{Carbon\Carbon::parse($sub_menu->created_at)->diffForHumans()}}</td>
                                            <td style="text-align: center">
                                                @if(($sub_menu->status) == 0)
                                                    <h5><span class="badge badge-danger">OFF</span></h5>
                                                @else
                                                    <h5><span class="badge badge-success">ON</span></h5>
                                                @endif
                                            </td>
                                            <td style="text-align: center">
                                                <a href="{{route('sub_menu.edit',$sub_menu->id)}}" class="btn btn-info"><i class="fas fa-pencil-alt" title="Edit"></i></a>
{{--                                                <a href="{{route('sub_menu.delete',$sub_menu->id)}}" class="btn btn-danger" onclick="return confirm('Do you want to delete?')"><i class="far fa-trash-alt" title="Delete"></i></a>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
@endsection
