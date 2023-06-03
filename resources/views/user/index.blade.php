@extends('daskboard')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <a href="{{route('user.create')}}" class="btn btn-primary"><i class="nav-icon fas fa-plus"></i> <span style="font-family: 'Siemreap', cursive;">បង្កើតអ្នកប្រើប្រាស់ថ្មី</span></a>
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
                            <div class="card-header"><h3><span style="font-family: 'Siemreap', cursive;">បញ្ជីអ្នកប្រើប្រាស់</span></h3></div>
                            <div class="card-body">
                                <table id="table_id" class="display">
                                    <thead>
                                    <tr style="text-align: center; font-family: 'Siemreap', cursive;">
                                        <th>ល.រ</th>
                                        <th>រូបភាព</th>
                                        <th>ឈ្មោះអ្នកប្រើប្រាស់</th>
                                        <th>អ៊ីម៉ែល</th>
                                        <th>លេខទូរស័ព្ទ</th>
                                        <th>តួនាទី</th>
                                        <th>បានបង្កើត</th>
                                        <th>ស្ថានភាព</th>
                                        <th>មុខងារ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $key=>$user)
                                        <tr>
                                            <th style="font-family: 'Siemreap', cursive; text-align: center;">{{$key+1}}</th>
                                            <td style="text-align: center;">
                                                @if($user->image)
                                                    <img src="{{asset('uploads/images_user/'.$user->image)}}" width="50" height="50" alt="">
                                                @else
                                                    <img src="{{asset('uploads/extension_file/img.jpg')}}" width="50" height="50" alt="">
                                                @endif
                                            </td>
                                            <td style="font-family: 'Siemreap', cursive;">{{$user->name}}</td>
                                            <td style="font-family: 'Siemreap', cursive; text-align: center;">{{$user->email}}</td>
                                            <td style="font-family: 'Siemreap', cursive; text-align: center;">0{{$user->phone}}</td>
                                            <td style="font-family: 'Siemreap', cursive; text-align: center;">{{$user->role->name}}</td>
                                            <td style="text-align: center;">{{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                                            <td style="text-align: center;">
                                                @if($user->status == 2)
                                                    <h5><span class="badge badge-danger">OFF</span></h5>
                                                @else
                                                    <h5><span class="badge badge-success">ON</span></h5>
                                                @endif
                                            </td>
                                            <td style="text-align: center">
                                                <a href="{{route('user.edit',$user->id)}}" class="btn btn-info"><i class="fas fa-pencil-alt" title="Edit"></i></a>
                                                <a href="{{route('user.delete',$user->id)}}" class="btn btn-danger" onclick="return confirm('Do you want to delete?')"><i class="far fa-trash-alt" title="delete"></i></a>
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
