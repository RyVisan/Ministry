@extends('daskboard')
@section('function', 'បង្កើតSubមីនុយ')
@section('subMenuOpen', 'menu-open')
@section('subMenu', 'active')
@section('subMenuC', 'active')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <a href="{{route('sub_menu.index')}}" class="btn btn-danger"><i class="nav-icon fas fa-arrow-left"></i> <span style="font-family: 'Siemreap', cursive;">បញ្ជីSubមីនុយ</span></a>
                    </h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


<div class="container">
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
                <h3><span style="font-family: 'Siemreap', cursive;">បង្កើតSubមីនុយថ្មី</span></h3>
            </div>
            <div class="card-body">
                <form action="{{route('sub_menu.save')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ឈ្មោះមីនុយ :</span></label>
                        <select name="menu_name" class="form-select" style="font-family: 'Siemreap', cursive;">
                            <option value="">-----សូមជ្រើសរើសឈ្មោះមីនុយមួយ-----</option>
                            @foreach($menus as $menu)
                                @if(old('menu_name') == $menu->id)
                                    <option selected value="{{$menu->id}}" style="font-family: 'Siemreap', cursive;">{{$menu->name}}</option>
                                @else
                                    <option value="{{$menu->id}}" style="font-family: 'Siemreap', cursive;" >{{$menu->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('menu_name')
                        <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{$message}}</span><br>
                        @enderror
                        <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ឈ្មោះSubមីនុយ :</span></label>
                        <input placeholder="សូមបញ្ជូលឈ្មោះSubមីនុយយ៉ាងតិច៣តួរអក្សរ" style="font-family: 'Siemreap', cursive;" type="text" name="sub_menu_name" value="{{old('sub_menu_name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('sub_menu_name')
                            <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                        @enderror
                        <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">សូមបញ្ជូលលេខសម្រាប់តម្រៀបមីនុយតាមដាប់ :</span></label>
                        <input placeholder="សូមបញ្ជូលលេខយ៉ាងតិច១" style="font-family: 'Siemreap', cursive;" type="text" name="order_by" value="{{old('order_by')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('order_by')
                        <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                        @enderror
                        <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ស្ថានភាព :</span></label>
                        <select name="status" class="form-select" style="font-family: 'Siemreap', cursive;">
                            <option @if(old('status') == 1) selected @endif value="1" style="font-family: 'Siemreap', cursive;">បង្ហាញ</option>
                            <option @if(old('status') == 2) selected @endif value="2" style="font-family: 'Siemreap', cursive;">មិនបង្ហាញ</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary form-control"><i class="fas fa-save"></i> <span style="font-family: 'Siemreap', cursive;">រក្សាទុក</span></button>
                </form>
            </div>
        </div>

    </div>
    <div class="col-2"></div>
    </div>
</div>
@endsection
