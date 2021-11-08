@extends('daskboard')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <a href="{{route('sub1_menu.create')}}" class="btn btn-primary"><i class="nav-icon fas fa-plus"></i> Create Sub1 Menu</a>
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
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header"><h3>List Sub1 Menu</h3></div>
                            <div class="card-body">
                                <table id="table_id" class="display">
                                    <thead>
                                    <tr>
                                        <th style="width: 50px; text-align: center">Id</th>
                                        <th style="text-align: center">Sub Menu Name</th>
                                        <th style="text-align: center">Sub1 Menu Name</th>
                                        <th style="text-align: center; width: 200px;">Created At</th>
                                        <th style="text-align: center; width: 200px;">Status</th>
                                        <th style="text-align: center; width: 200px;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sub1_menus as $key=>$sub1_menu)
                                        <tr>
                                            <th scope="row" style="text-align: center; width: 100px;">{{$key+1}}</th>
                                            <td style="font-family: 'Siemreap', cursive;">{{$sub1_menu->submenu->name}}</td>
                                            <td style="font-family: 'Siemreap', cursive;">{{$sub1_menu->sub1menu_name}}</td>
                                            <td style="text-align: center;">{{Carbon\Carbon::parse($sub1_menu->created_at)->diffForHumans()}}</td>
                                            <td style="text-align: center;">
                                                @if($sub1_menu->status == 1)
                                                    <h5><span class="badge badge-success">ON</span></h5>
                                                @else
                                                    <h5><span class="badge badge-danger">OFF</span></h5>
                                                @endif
                                            </td>
                                            <td style="text-align: center">
                                                <a href="{{route('sub1_menu.edit',$sub1_menu->id)}}" class="btn btn-info"><i class="fas fa-pencil-alt" title="Edit"></i></a>
{{--                                                <a href="{{route('sub1_menu.delete',$sub1_menu->id)}}" class="btn btn-danger" onclick="return confirm('Do you want to delete?')"><i class="far fa-trash-alt" title="Delete"></i></a>--}}
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
