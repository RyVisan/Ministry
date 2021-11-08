@extends('daskboard')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <a href="{{route('document.index')}}" class="btn btn-primary"><i class="nav-icon fas fa-arrow-left"></i> <span style="font-family: 'Siemreap', cursive;">បញ្ជីឯកសារ</span></a>
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
                    <div class="card">
                        <div class="card-header">
                            <h3><span style="font-family: 'Siemreap', cursive;">កែឯកសារ</span></h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('document.update',$documents->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ឈ្មោះមីនុយ :</span></label>
                                            <select name="menu_name" class="form-select" id="menu_name" style="font-family: 'Siemreap', cursive;">
                                                <option value="">-----សូមជ្រើសរើសឈ្មោះមីនុយមួយ-----</option>
                                                @foreach($menus as $menu)
                                                    @if(old('menu_name',$documents->menu_id) == $menu->id)
                                                        <option selected value="{{$menu->id}}" style="font-family: 'Siemreap', cursive;" >{{$menu->name}}</option>
                                                    @else
                                                        <option value="{{$menu->id}}" style="font-family: 'Siemreap', cursive;" >{{$menu->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('menu_name')
                                                <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{$message}}</span><br>
                                            @enderror
                                            <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ឈ្មោះSubមីនុយ :</span></label>
                                            <select name="sub_menu_name" class="form-select" id="sub_menu_name" style="font-family: 'Siemreap', cursive;">
                                                <option value="">-----សូមជ្រើសរើសSubមីនុយមួយ-----</option>
                                                @foreach($sub_menus as $sub_menu)
                                                    @if(old('sub_menu_name',$documents->submenu_id) == $sub_menu->id)
                                                        <option selected value="{{$sub_menu->id}}" style="font-family: 'Siemreap', cursive;" >{{$sub_menu->name}}</option>
                                                    @else
                                                        <option value="{{$sub_menu->id}}" style="font-family: 'Siemreap', cursive;" >{{$sub_menu->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <br><div class="row">
                                                <div class="col-6">
                                                    <label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ឯកសារ :</span></label><br>
                                                    <input type="file" name="file" value="{{$documents->file_name}}">
                                                    @error('file')
                                                        <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span></span>
                                                    @enderror<br>
                                                    @if(($documents->extension) == 'docx')
                                                        <br><img src="{{asset('uploads/extension_file/word.png')}}" width="30" height="30" alt="">
                                                    @elseif(($documents->extension) == 'pdf')
                                                        <br><img src="{{asset('uploads/extension_file/pdf.jpg')}}" width="30" height="30" alt="">
                                                    @elseif(($documents->extension) == 'xlsx')
                                                        <br><img src="{{asset('uploads/extension_file/excel.png')}}" width="30" height="30" alt="">
                                                    @endif
                                                    <input type="text" name="new_file" value="{{$documents->name}}.{{$documents->extension}}" style="border: none">
                                                </div>
                                                <div class="col-6">
                                                    <label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">រូបភាព :</span></label><br>
                                                    <input type="file" name="image">
                                                    @error('image')
                                                        <span class="text-danger"><span style="font-family: 'Siemreap', cursive;">{{ $message }}</span></span>
                                                    @enderror
                                                    @if($documents->image)
                                                        <br><br><img src="{{asset('uploads/images_document/'.$documents->image)}}" width="100" height="100" alt="">
                                                    @else
                                                        <br><br><img src="{{asset('uploads/extension_file/img.jpg')}}" width="100" height="100" alt="">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ឈ្មោះឯកសារ :</span></label>
                                            <input placeholder="សូមបញ្ជូលឈ្មោះឯកសារយ៉ាងតិច៣តួរអក្សរ" style="font-family: 'Siemreap', cursive;" type="text" name="document_name" value="{{old('document_name',$documents->name)}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            @error('document_name')
                                                <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                            @enderror
                                            <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ការបរិច្ឆេទ :</span></label>
                                            <input style="font-family: 'Siemreap', cursive;" type="date" name="date" value="{{old('date',$documents->date)}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            @error('date')
                                                <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                            @enderror
                                            <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ការពិពណ៌នា :</span></label>
                                            <textarea name="description" cols="30" rows="4" class="form-control">{{old('description',$documents->description)}}</textarea>
                                            <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ទីតាំង :</span></label>
                                            <select name="location" class="form-select" style="font-family: 'Siemreap', cursive;">
                                                <option selected value="" style="font-family: 'Siemreap', cursive;">-----សូមជ្រើសរើសទីតាំង-----</option>
                                                <option @if(old('location',$documents->location) == 1) selected @endif value="1" style="font-family: 'Siemreap', cursive;">ខាងស្តាំ</option>
                                                <option @if(old('location',$documents->location) == 2) selected @endif value="2" style="font-family: 'Siemreap', cursive;">ក្រោមស្លាយ</option>
                                                <option @if(old('location',$documents->location) == 3) selected @endif value="3" style="font-family: 'Siemreap', cursive;">កម្មវិធីផ្សេងៗ</option>
                                                <option @if(old('location',$documents->location) == 4) selected @endif value="4" style="font-family: 'Siemreap', cursive;">ឯកសារបោះពុម្ភ</option>
                                            </select>
                                            @error('location')
                                            <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{$message}}</span><br>
                                            @enderror
                                            <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ស្ថានភាព :</span></label>
                                            <select name="status" class="form-select" style="font-family: 'Siemreap', cursive;">
                                                @if(old('status',$documents->status) == 1)
                                                    <option selected value="1" style="font-family: 'Siemreap', cursive;">បង្ហាញ</option>
                                                    <option value="2" style="font-family: 'Siemreap', cursive;">មិនបង្ហាញ</option>
                                                @else
                                                    <option value="1" style="font-family: 'Siemreap', cursive;">បង្ហាញ</option>
                                                    <option selected value="2" style="font-family: 'Siemreap', cursive;">មិនបង្ហាញ</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success form-control"><i class="fas fa-save"></i> <span style="font-family: 'Siemreap', cursive;">កែឥឡូវ</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('js')
            <script>
                $(document).ready(function () {
                    $('body').on('change','#menu_name',function () {
                        var id = $(this).val();
                        if(id){
                            $.ajax({
                                url : "/get/submenu/menu/"+id,
                                type: "GET",
                                dataType : "json",
                                success : function (data) {
                                    $('#sub_menu_name').empty();
                                    $('#sub_menu_name').append('<option value="">-----សូមជ្រើសរើសឈ្មោះSubមីនុយមួយ-----</option>');
                                    $.each(data,function (id,value){
                                        $('#sub_menu_name').append('<option value="'+id+'">'+value+'</option>');
                                    });
                                }
                            });
                        }
                    });
                    // $('body').on('change','#sub_menu',function(){
                    //     var subMenuId = $(this).val();
                    //     if(subMenuId){
                    //         $.ajax({
                    //             url: "/get/sub1menu/submenu/"+subMenuId,
                    //             type: "GET",
                    //             dataType: "json",
                    //             success : function (data) {
                    //                 $('#sub1_menu').empty();
                    //                 $('#sub1_menu').append('<option value="">-----Please select one sub1 menu-----</option>');
                    //                 $.each(data,function(key,value){
                    //                     $('#sub1_menu').append('<option value="'+key+'">'+value+'</option>');
                    //                 });
                    //             }
                    //         });
                    //     }
                    // });
                });
            </script>
@endsection



{{--        var id = $(this).val();--}}
{{--        if (id){--}}
{{--        $.get( "<?php echo url('')?>/get/submenu/menu/"+id, function( data ) {--}}
{{--        $('#sub_menu').empty();--}}
{{--        for (let i = 0; i < data.length; i++){--}}
{{--        $('#sub_menu').append(`<option value="${data[i].id}"> ${data[i].name} </option>`);--}}
{{--        }--}}
{{--        });--}}
{{--        }else{--}}
{{--        $('#sub_menu').empty();--}}
{{--        }--}}
