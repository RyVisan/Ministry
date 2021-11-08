@extends('daskboard')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <a href="{{route('other.create')}}" class="btn btn-primary"><i class="nav-icon fas fa-plus"></i> <span style="font-family: 'Siemreap', cursive;">បង្កើតកម្មវិធីផ្សេងៗថ្មី</span></a>
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
                            <div class="card-header"><h3><span style="font-family: 'Siemreap', cursive;">បញ្ជីកម្មវិធីផ្សេងៗ</span></h3></div>
                            <div class="card-body">
                                <table id="table_id" class="display">
                                    <thead>
                                    <tr style="text-align: center; font-family: 'Siemreap', cursive;">
                                        <th>ល.រ</th>
                                        <th>ចំណងជើងកម្មវិធី</th>
                                        <th>ការពិពណ៌នា</th>
                                        <th>កាលបរិច្ឆេទ</th>
                                        <th>រូបភាព</th>
                                        <th>បានបង្កើត</th>
                                        <th>ស្ថានភាព</th>
                                        <th>មុខងារ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($covers as $key=>$cover)
                                        <tr>
                                            <th style="font-family: 'Siemreap', cursive; text-align: center;">{{$key+1}}</th>
                                            <td style="font-family: 'Siemreap', cursive;">{{$cover->name}}</td>
                                            <td style="font-family: 'Siemreap', cursive;">{{$cover->description}}</td>
                                            <td style="font-family: 'Siemreap', cursive;">{{$cover->date}}</td>
                                            <td style="text-align: center;">
                                                @if($cover->image)
                                                    <img src="{{asset('uploads/images_other/cover/'.$cover->image)}}" width="50" height="50" alt="">
                                                @else
                                                    <img src="{{asset('uploads/extension_file/img.jpg')}}" width="50" height="50" alt="">
                                                @endif
                                            </td>
                                            <td style="text-align: center;">{{Carbon\Carbon::parse($cover->created_at)->diffForHumans()}}</td>
                                            <td style="text-align: center;">
                                                @if($cover->status == 2)
                                                    <h5><span class="badge badge-danger">OFF</span></h5>
                                                @else
                                                    <h5><span class="badge badge-success">ON</span></h5>
                                                @endif
                                            </td>
                                            <td style="text-align: center">
                                                <a href="{{route('other.edit',$cover->id)}}" class="btn btn-info"><i class="fas fa-pencil-alt" title="Edit"></i></a>
                                                <a href={{route('other.delete',$cover->id)}}"" class="btn btn-danger" onclick="return confirm('Do you want to delete?')"><i class="far fa-trash-alt" title="delete"></i></a>
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
