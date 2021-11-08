@extends('index')
@section('content')
    @if(($posts->menu->id == $posts->menu_id) && ($posts->submenu->id == $posts->submenu_id))
    <div class="content mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 justify-content-center">
                    <div class="card">
                        <div class="card-header"><h3><span style="font-family: 'Siemreap', cursive;">បង្ហាញឯកសារទាំងអស់</span></h3></div>
                        <div class="card-body">
                            <table id="table_id" class="display">
                                <thead>
                                <tr style="text-align: center; font-family: 'Siemreap', cursive;">
                                    <th>ល.រ</th>
                                    <th>រូបភាព</th>
                                    <th>ឈ្មោះឯកសារ</th>
                                    <th>កាលបរិច្ឆេទ</th>
                                    <th>ទាញយក</th>
                                    <th>មុខងារ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $key=>$document)
                                    @if(($document->menu_id == $document->menu->id) && ($document->submenu_id == $document->submenu->id))
                                    <tr>
                                        <td style="font-family: 'Siemreap', cursive; text-align: center;">{{$key+1}}</td>
                                        <td style="text-align: center;">
                                            @if($document->image)
                                                <img src="{{asset('uploads/images_document/'.$document->image)}}" width="50" height="50" alt="">
                                            @else
                                                <img src="{{asset('uploads/extension_file/img.jpg')}}" width="50" height="50" alt="">
                                            @endif
                                        </td>
                                        <td style="font-family: 'Siemreap', cursive;">{{$document->name}}</td>
                                        <td style="font-family: 'Siemreap', cursive; text-align: center;">{{$document->date}}</td>
                                        <td style="text-align: center;">
                                            @if(($document->extension) == 'docx')
                                                <img src="{{asset('uploads/extension_file/word.png')}}" width="30" height="30" alt="">
                                            @elseif(($document->extension) == 'xlsx')
                                                <img src="{{asset('uploads/extension_file/excel.png')}}" width="30" height="30" alt="">
                                            @elseif(($document->extension) == 'pdf')
                                                <img src="{{asset('uploads/extension_file/pdf.jpg')}}" width="30" height="30" alt="">
                                            @endif
                                        </td>
                                        <td style="text-align: center">
                                            <a href="" class="btn btn-info"><i class="fas fa-pencil-alt" title="Edit"></i></a>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection

