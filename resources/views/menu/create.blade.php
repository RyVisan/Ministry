@extends('daskboard')
@section('function', 'បង្កើតមីនុយ')
@section('menuOpen', 'menu-open')
@section('Menu', 'active')
@section('menuC', 'active')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <a href="{{route('menu.index')}}" class="btn btn-danger"><i class="nav-icon fas fa-arrow-left"></i> <span style="font-family: 'Siemreap', cursive;">បញ្ជីមីនុយ</span></a>
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
                <h3 style="font-family: 'Siemreap', cursive;">បង្កើតមីនុយថ្មី</h3>
            </div>
            <div class="card-body">
                <form action="{{route('menu.save')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ឈ្មោះមីនុយ :</span></label>
                        <input placeholder="សូមបញ្ជូលឈ្មោះមីនុយយ៉ាងតិច៣" style="font-family: 'Siemreap', cursive;" type="text" name="menu_name" value="{{old('menu_name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('menu_name')
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
