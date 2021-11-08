@extends('daskboard')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <a href="{{route('other.index')}}" class="btn btn-primary"><i class="nav-icon fas fa-arrow-left"></i> <span style="font-family: 'Siemreap', cursive;">បញ្ជីកម្មវិធីផ្សេងៗ</span></a>
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
                            <h3><span style="font-family: 'Siemreap', cursive;">កែកម្មវិធីផ្សេងៗ</span></h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('other.update',$covers->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ចំណងជើងកម្មវិធី :</span></label>
                                <input placeholder="សូមបញ្ជូលចំណងជើងយ៉ាងតិច៣តួរអក្សរ" style="font-family: 'Siemreap', cursive;" type="text" name="name" value="{{old('name',$covers->name)}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('name')
                                <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">កាលបរិច្ចេទ :</span></label>
                                <input type="date" name="date" value="{{old('date',$covers->date)}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('date')
                                <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ការពិពណ៌នា :</span></label>
                                <textarea name="description" cols="30" rows="4" class="form-control"​style="font-family: 'Siemreap', cursive;">{{old('description',$covers->description)}}</textarea>
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">រូបតំណាងខាងមុខ :</span></label>
                                <input type="file" name="cover"><br>
                                <img src="{{asset('uploads/images_other/cover/'.$covers->image)}}" width="150px"  alt=""><br>
                                @error('cover')
                                <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">រូបភាព :</span></label>
                                <input type="file" name="image[]" multiple><br>
                                <div class="row">
                                    @foreach($images as $image)
                                        <div class="col-2">
{{--                                            <form action="{{route('other.delete_img',$image->id)}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="btn btn-danger" title="Delete">X</button>--}}
{{--                                            </form>--}}
                                            <img src="{{asset('uploads/images_other/images/'.$image->image)}}" width="100%" alt=""><br><br>
                                        </div>
                                    @endforeach
                                </div>
                                @error('image')
                                <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ស្ថានភាព :</span></label>
                                <select name="status" class="form-select" style="font-family: 'Siemreap', cursive;">
                                    @if(old('status',$covers->status) == 1)
                                        <option selected value="1" style="font-family: 'Siemreap', cursive;">បង្ហាញ</option>
                                        <option value="2" style="font-family: 'Siemreap', cursive;">មិនបង្ហាញ</option>
                                    @else
                                        <option value="1" style="font-family: 'Siemreap', cursive;">បង្ហាញ</option>
                                        <option selected value="2" style="font-family: 'Siemreap', cursive;">មិនបង្ហាញ</option>
                                    @endif
                                </select>
                                <br><button type="submit" class="btn btn-success form-control"><i class="fas fa-save"></i> <span style="font-family: 'Siemreap', cursive;">កែឥឡូវ</span></button>
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
