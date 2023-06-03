@extends('daskboard')
@section('function', 'បញ្ជីមីនុយ')
@section('menuOpen', 'menu-open')
@section('Menu', 'active')
@section('menuI', 'active')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <a href="{{route('menu.create')}}" class="btn btn-primary"><i class="nav-icon fas fa-plus"></i> <span style="font-family: 'Siemreap', cursive;">បង្កើតមីនុយថ្មី</span></a>
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
                            <div class="card-header"><h3><span style="font-family: 'Siemreap', cursive;">បញ្ជីមីនុយ</span></h3></div>
                            <div class="card-body">
                                <table id="table_id" class="display">
                                    <thead>
                                    <tr style="font-family: 'Siemreap', cursive;">
                                        <th style="width: 50px; text-align: center">ល.រ</th>
                                        <th style="text-align: center">ឈ្មោះមីនុយ</th>
                                        <th style="text-align: center">ការតម្រៀប</th>
                                        <th style="text-align: center; width: 200px;">បានបង្កើត</th>
                                        <th style="text-align: center; width: 200px;">ស្ថានភាព</th>
                                        <th style="text-align: center; width: 200px;">មុខងារ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($menus as $key=>$menu)
                                        <tr>
                                            <th scope="row" style="text-align: center">{{$key+1}}</th>
                                            <td style="font-family: 'Siemreap', cursive;">{{$menu->name}}</td>
                                            <td style="font-family: 'Siemreap', cursive; text-align: center;">{{$menu->order_by}}</td>
                                            <td style="text-align: center;">{{Carbon\Carbon::parse($menu->created_at)->diffForHumans()}}</td>
                                            <td style="text-align: center">
                                                @if($menu->status == 2)
                                                    <h5><span class="badge badge-danger">OFF</span></h5>
                                                @else
                                                    <h5><span class="badge badge-success">ON</span></h5>
                                                @endif
                                            </td>
                                            <td style="text-align: center">
                                                <a href="{{route('menu.edit',$menu->id)}}" class="btn btn-info"><i class="fas fa-pencil-alt" title="Edit"></i></a>
{{--                                                <a href="{{route('menu.delete',$menu->id)}}" class="btn btn-danger" onclick="return confirm('Do you want to delete?')"><i class="far fa-trash-alt" title="Delete"></i></a>--}}
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
