@extends('index')
@section('content')
    <div class="content-header">
        <div class="card mt-2">
            <div class="card-header">
                <h3><span style="font-family: 'Siemreap', cursive;">{{ $menu_name->name }}</span></h3>
            </div>
            <div class="card-body">
                <table id="table_id" class="display">
                    <thead>
                        <tr style="text-align: center; font-family: 'Siemreap', cursive;">
                            <th style="width: 2%;">ល.រ</th>
                            <th style="width: 8%;">រូបភាព</th>
                            <th style="width: 60%;">ឈ្មោះឯកសារ</th>
                            <th style="width: 8%;">កាលបរិច្ឆេទ</th>
                            <th style="width: 2%;">ទាញយក</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($documents as $key=>$document)
                        <tr>
                            <td style="font-family: 'Siemreap', cursive; text-align: center;">{{$key+1}}</td>
                            <td style="text-align: center;">
                                @if($document->image)
                                    <img src="{{asset('uploads/images_document/'.$document->image)}}" width="50" height="55" alt="">
                                @else
                                    <img src="{{asset('uploads/extension_file/img.jpg')}}" width="50" height="50" alt="">
                                @endif
                            </td>
                            <td style="font-family: 'Siemreap', cursive;">{{$document->name}}</td>
                            <td style="font-family: 'Siemreap', cursive; text-align: center;">{{$document->date}}</td>
                            <td style="text-align: center;">
                                @if(($document->extension) == 'docx')
                                    <a href="{{url('uploads/files/'.$document->file_name)}}"><img src="{{asset('uploads/extension_file/word.png')}}" width="30" height="30" title="ចុចដើម្បីទាញយក"></a>
                                @elseif(($document->extension) == 'xlsx')
                                    <a href="{{url('uploads/files/'.$document->file_name)}}"><img src="{{asset('uploads/extension_file/excel.png')}}" width="30" height="30" title="ចុចដើម្បីទាញយក"></a>
                                @elseif(($document->extension) == 'pdf')
                                    <a href="{{route('view',$document->id)}}">view</a><br>
                                    <a href="{{url('uploads/files/'.$document->file_name)}}"><img src="{{asset('uploads/extension_file/pdf.jpg')}}" width="30" height="30" title="ចុចដើម្បីទាញយក"></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

