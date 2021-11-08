@extends('daskboard')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <a href="{{route('document.create')}}" class="btn btn-primary"><i class="nav-icon fas fa-plus"></i> <span style="font-family: 'Siemreap', cursive;">បង្កើតឯកសារថ្មី</span></a>
                    </h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
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
                            <div class="card-header"><h3><span style="font-family: 'Siemreap', cursive;">បញ្ជីឯកសារ</span></h3></div>
                            <div class="card-body">
                                <table id="table_id" class="display">
                                    <thead>
                                    <tr style="text-align: center; font-family: 'Siemreap', cursive;">
                                        <th>ល.រ</th>
                                        <th>ឈ្មោះមីនុយ</th>
                                        <th>ឈ្មោះSubមីនុយ</th>
                                        <th>ឈ្មោះឯកសារ</th>
                                        <th>កាលបរិច្ឆេទ</th>
                                        <th>ការពិពណ៌នា</th>
                                        <th>ទីតាំង</th>
                                        <th>រូបភាព</th>
                                        <th>ឯកសារ</th>
                                        <th>បានបង្កើត</th>
                                        <th>ស្ថានភាព</th>
                                        <th>មុខងារ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($documents as $key=>$document)
                                        <tr>
                                            <td style="font-family: 'Siemreap', cursive; text-align: center;">{{$key+1}}</td>
                                            <td style="font-family: 'Siemreap', cursive;">{{$document->menu->name}}</td>
                                            <td style="font-family: 'Siemreap', cursive;">
                                                @if(($document->submenu_id) == null)
                                                    No Sub Menu
                                                @else
                                                    {{$document->submenu->name}}
                                                @endif
                                            </td>
                                            <td style="font-family: 'Siemreap', cursive;">{{$document->name}}</td>
                                            <td style="font-family: 'Siemreap', cursive; text-align: center;">{{$document->date}}</td>
                                            <td style="font-family: 'Siemreap', cursive;">{{$document->description}}</td>
                                            @if($document->location == 1)
                                                <td style="font-family: 'Siemreap', cursive; text-align: center;">ខាងស្តាំ</td>
                                            @elseif($document->location == 2)
                                                <td style="font-family: 'Siemreap', cursive; text-align: center;">ក្រោមស្លាយ</td>
                                            @elseif($document->location == 3)
                                                <td style="font-family: 'Siemreap', cursive; text-align: center;">កម្មវិធីផ្សេងៗ</td>
                                            @elseif($document->location == 4)
                                                <td style="font-family: 'Siemreap', cursive; text-align: center;">ឯកសារបោះពុម្ភ</td>
                                            @elseif($document->location == null)
                                                <td style="font-family: 'Siemreap', cursive; text-align: center;">---</td>
                                            @endif
                                            <td style="text-align: center;">
                                                @if($document->image)
                                                    <img src="{{asset('uploads/images_document/'.$document->image)}}" width="50" height="50" alt="">
                                                @else
                                                    <img src="{{asset('uploads/extension_file/img.jpg')}}" width="50" height="50" alt="">
                                                @endif
                                            </td>
                                            <td style="text-align: center;">
                                                @if(($document->extension) == 'docx')
                                                    <img src="{{asset('uploads/extension_file/word.png')}}" width="30" height="30" alt="">
                                                @elseif(($document->extension) == 'xlsx')
                                                    <img src="{{asset('uploads/extension_file/excel.png')}}" width="30" height="30" alt="">
                                                @elseif(($document->extension) == 'pdf')
                                                    <img src="{{asset('uploads/extension_file/pdf.jpg')}}" width="30" height="30" alt="">
                                                @endif
                                            </td>
                                            <td style="text-align: center;">{{Carbon\Carbon::parse($document->created_at)->diffForHumans()}}</td>
                                            <td style="text-align: center;">
                                                @if($document->status == 0)
                                                    <h5><span class="badge badge-danger">OFF</span></h5>
                                                @else
                                                    <h5><span class="badge badge-success">ON</span></h5>
                                                @endif
                                            </td>
                                            <td style="text-align: center">
                                                <a href="{{route('document.edit',$document->id)}}" class="btn btn-info"><i class="fas fa-pencil-alt" title="Edit"></i></a>
                                                <a href="{{route('document.delete',$document->id)}}" class="btn btn-danger" onclick="return confirm('Do you want to delete?')"><i class="far fa-trash-alt" title="delete"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
