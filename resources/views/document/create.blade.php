@extends('daskboard')
@section('function', 'បង្កើតឯកសារ')
@section('documentOpen', 'menu-open')
@section('Document', 'active')
@section('documentC', 'active')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <a href="{{route('document.index')}}" class="btn btn-danger"><i class="nav-icon fas fa-arrow-left"></i> <span style="font-family: 'Siemreap', cursive;">បញ្ជីឯកសារ</span></a>
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
            <div class="card-header">
                <h3><span style="font-family: 'Siemreap', cursive;">បង្កើតឯកសារថ្មី</span></h3>
            </div>
            <div class="card-body">
                <form action="{{route('document.save')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ឈ្មោះមីនុយ</span></label>
                                <select name="menu_name" class="form-select" id="menu_name" style="font-family: 'Siemreap', cursive;">
                                    <option value="">-----សូមជ្រើសរើសឈ្មោះមីនុយមួយ-----</option>
                                    @foreach($menus as $menu)
                                        <option value="{{$menu->id}}" style="font-family: 'Siemreap', cursive;" >{{$menu->name}}</option>
                                    @endforeach
                                </select>
                                @error('menu_name')
                                    <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{$message}}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ឈ្មោះSubមីនុយ :</span></label>
                                <select name="sub_menu_name" class="form-select" id="sub_menu_name" style="font-family: 'Siemreap', cursive;">
                                    <option value="">-----សូមជ្រើសរើសឈ្មោះSubមីនុយមួយ-----</option>
                                </select>
                                <br><div class="row">
                                    <div class="col-6">
                                        <label for="exampleInputEmail1" class="form-label">File :</label><br>
                                        <input type="file" name="file">
                                        @error('file')
                                        <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span>
                                        @enderror<br>
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleInputEmail1" class="form-label">Image :</label><br>
                                        <input type="file" name="image">
                                        @error('image')
                                            <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ឈ្មោះឯកសារ :</span></label>
                                <input placeholder="សូមបញ្ជូលឈ្មោះឯកសារយ៉ាងតិច៣តួរអក្សរ" style="font-family: 'Siemreap', cursive;" type="text" name="document_name" value="{{old('document_name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('document_name')
                                    <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">កាលបរិច្ឆេទ :</span></label>
                                <input style="font-family: 'Siemreap', cursive;" type="date" name="date" value="{{old('date')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('date')
                                    <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ការពិពណ៌នា :</span></label>
                                <textarea name="description" cols="30" rows="4" class="form-control">{{old('description')}}</textarea>
                                @error('description')
                                    <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ទីតាំង :</span></label>
                                <select name="location" class="form-select" style="font-family: 'Siemreap', cursive;">
                                    <option selected value="" style="font-family: 'Siemreap', cursive;">-----សូមជ្រើសរើសទីតាំង-----</option>
                                    <option @if(old('location') == 1) selected @endif value="1" style="font-family: 'Siemreap', cursive;">ខាងស្តាំ</option>
                                    <option @if(old('location') == 2) selected @endif value="2" style="font-family: 'Siemreap', cursive;">ក្រោមស្លាយ</option>
                                    <option @if(old('location') == 3) selected @endif value="3" style="font-family: 'Siemreap', cursive;">កម្មវិធីផ្សេងៗ</option>
                                    <option @if(old('location') == 4) selected @endif value="4" style="font-family: 'Siemreap', cursive;">ឯកសារបោះពុម្ភ</option>
                                </select>
                                @error('location')
                                    <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{$message}}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ស្ថានភាព :</span></label>
                                <select name="status" class="form-select" style="font-family: 'Siemreap', cursive;">
                                    <option @if(old('status') == 1) selected @endif value="1" style="font-family: 'Siemreap', cursive;">បង្ហាញ</option>
                                    <option @if(old('status') == 2) selected @endif value="2" style="font-family: 'Siemreap', cursive;">មិនបង្ហាញ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary form-control"><i class="fas fa-save"></i> <span style="font-family: 'Siemreap', cursive;">រក្សាទុក</span></button>
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
                //    var subMenuId = $(this).val();
                //    if(subMenuId){
                //        $.ajax({
                //            url: "/get/sub1menu/submenu/"+subMenuId,
                //            type: "GET",
                //            dataType: "json",
                //            success : function (data) {
                //                $('#sub1_menu').empty();
                //                $('#sub1_menu').append('<option value="">-----Please select one sub1 menu-----</option>');
                //                $.each(data,function(key,value){
                //                     $('#sub1_menu').append('<option value="'+key+'">'+value+'</option>');
                //                });
                //            }
                //        });
                //    }
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
