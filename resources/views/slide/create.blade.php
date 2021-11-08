@extends('daskboard')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <a href="{{route('img_slide.index')}}" class="btn btn-primary"><i class="nav-icon fas fa-arrow-left"></i> <span style="font-family: 'Siemreap', cursive;">បញ្ជីស្លាយរូបភាព</span></a>
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
                <div class="col-2"></div>
                <div class="col-8 justify-content-center">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><span style="font-family: 'Siemreap', cursive;">{{session('success')}}</span></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3><span style="font-family: 'Siemreap', cursive;">បង្កើតស្លាយរូបភាពថ្មី</span></h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('img_slide.save')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ចំណងជើងស្លាយរូបភាព :</span></label>
                                <input placeholder="សូមបញ្ជូលឈ្មោះចំណងជើងយ៉ាងតិច៣តួរអក្សរ" style="font-family: 'Siemreap', cursive;" type="text" name="slide_title" value="{{old('slide_title')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('slide_title')
                                <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ការពិពណ៌នា :</span></label>
                                <textarea name="description" cols="30" rows="4" class="form-control"​style="font-family: 'Siemreap', cursive;">{{old('description')}}</textarea>
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">រូបភាព :</span></label>
                                <input type="file" name="image"><br>
                                @error('image')
                                <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span>
                                @enderror
                                <br><br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">សូមបញ្ជូលលេខសម្រាប់តម្រៀបរូបភាពតាមលំដាប់ :</span></label>
                                <input placeholder="សូមបញ្ជូលលេខយ៉ាងតិច១" style="font-family: 'Siemreap', cursive;" type="text" name="order_by" value="{{old('order_by')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('order_by')
                                <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ស្ថានភាព :</span></label>
                                <select name="status" class="form-select" style="font-family: 'Siemreap', cursive;">
                                    <option @if(old('status') == 1) selected @endif value="1" style="font-family: 'Siemreap', cursive;">បង្ហាញ</option>
                                    <option @if(old('status') == 2) selected @endif value="2" style="font-family: 'Siemreap', cursive;">មិនបង្ហាញ</option>
                                </select>
                                <br><button type="submit" class="btn btn-success form-control"><i class="fas fa-save"></i> <span style="font-family: 'Siemreap', cursive;">រក្សាទុក</span></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
        @endsection

        @section('js')
            <script>
                $(document).ready(function () {
                    $('body').on('change','#menu_name',function () {
                        var catId = $(this).val();
                        if(catId){
                            $.ajax({
                                url : "/get/submenu/menu/"+catId,
                                type: "GET",
                                dataType : "json",
                                success : function (data) {
                                    $('#sub_menu').empty();
                                    $('#sub_menu').append('<option value="">-----Please select one sub menu-----</option>');
                                    $.each(data,function (key,value) {
                                        $('#sub_menu').append('<option value="'+key+'">'+value+'</option>');
                                    });
                                }
                            });
                        }
                    });
                    $('body').on('change','#sub_menu',function(){
                        var subMenuId = $(this).val();
                        if(subMenuId){
                            $.ajax({
                                url: "/get/sub1menu/submenu/"+subMenuId,
                                type: "GET",
                                dataType: "json",
                                success : function (data) {
                                    $('#sub1_menu').empty();
                                    $('#sub1_menu').append('<option value="">-----Please select one sub1 menu-----</option>');
                                    $.each(data,function(key,value){
                                        $('#sub1_menu').append('<option value="'+key+'">'+value+'</option>');
                                    });
                                }
                            });
                        }
                    });
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
