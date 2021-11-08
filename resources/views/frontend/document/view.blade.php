@extends('index')
@section('content')
    <p>
        viewing pdf file
        <br><iframe src="{{url('uploads/files/'.$view_file->file_name)}}" style="width: 500px; height: 700px;"></iframe>
    </p>
@endsection
