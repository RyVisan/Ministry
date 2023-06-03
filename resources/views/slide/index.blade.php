@extends('daskboard')
@section('function', 'បញ្ជីស្លាយរូបភាព')
@section('slideOpen', 'menu-open')
@section('Slide', 'active')
@section('slideI', 'active')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <a href="{{route('img_slide.create')}}" class="btn btn-primary"><i class="nav-icon fas fa-plus"></i> <span style="font-family: 'Siemreap', cursive;">បង្កើតស្លាយរូបភាពថ្មី</span></a>
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
                            <div class="card-header"><h3><span style="font-family: 'Siemreap', cursive;">បង្ហាញស្លាយរូបភាពទាំងអស់</span></h3></div>
                            <div class="card-body">
                                <table id="table_id" class="display">
                                    <thead>
                                    <tr style="text-align: center; font-family: 'Siemreap', cursive;">
                                        <th>ល.រ</th>
                                        <th>ចំណងជើង</th>
                                        <th>ការពិពណ៌នា</th>
{{--                                        <th>អ្នកបង្កើត</th>--}}
                                        <th>រូបភាព</th>
                                        <th>ការតម្រៀប</th>
                                        <th>បានបង្កើត</th>
                                        <th>ស្ថានភាព</th>
                                        <th>មុខងារ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($img_slides as $key=>$img_slide)
                                        <tr>
                                            <th style="font-family: 'Siemreap', cursive; text-align: center;">{{$key+1}}</th>
                                            <td style="font-family: 'Siemreap', cursive;">{{$img_slide->slide_title}}</td>
                                            <td style="font-family: 'Siemreap', cursive;">{{$img_slide->description}}</td>
{{--                                            <td style="font-family: 'Siemreap', cursive; text-align: center;">user name</td>--}}
                                            <td style="text-align: center;">
                                                @if($img_slide->image)
                                                    <img src="{{asset('uploads/images_slide/'.$img_slide->image)}}" width="50" height="50" alt="">
                                                @else
                                                    <img src="{{asset('uploads/extension_file/img.jpg')}}" width="50" height="50" alt="">
                                                @endif
                                            </td>
                                            <td style="font-family: 'Siemreap', cursive; text-align: center;">{{$img_slide->order_by}}</td>
                                            <td style="text-align: center;">{{Carbon\Carbon::parse($img_slide->created_at)->diffForHumans()}}</td>
                                            <td style="text-align: center;">
                                                @if($img_slide->status == 2)
                                                    <h5><span class="badge badge-danger">OFF</span></h5>
                                                @else
                                                    <h5><span class="badge badge-success">ON</span></h5>
                                                @endif
                                            </td>
                                            <td style="text-align: center">
                                                <a href="{{route('img_slide.edit',$img_slide->id)}}" class="btn btn-info"><i class="fas fa-pencil-alt" title="Edit"></i></a>
                                                <a href="{{route('img_slide.delete',$img_slide->id)}}" class="btn btn-danger" onclick="return confirm('Do you want to delete?')"><i class="far fa-trash-alt" title="delete"></i></a>
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
