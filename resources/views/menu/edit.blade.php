@extends('daskboard')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <a href="{{route('menu.index')}}" class="btn btn-primary"><i class="nav-icon fas fa-arrow-left"></i> <span style="font-family: 'Siemreap', cursive;">បញ្ជីមីនុយ</span></a>
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
        <div class="card">
            <div class="card-header">
                <h3 style="font-family: 'Siemreap', cursive;">កែមីនុយ</h3>
            </div>
            <div class="card-body">
                <form action="{{route('menu.update',$menus->id)}}" method="post" autocomplete="off">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ឈ្មោះមីនុយ :</span></label>
                        <input placeholder="សូមបញ្ជូលឈ្មោះមីនុយយ៉ាងតិច៣" style="font-family: 'Siemreap', cursive;" type="text" name="menu_name" value="{{old('menu_name',$menus->name)}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('menu_name')
                        <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                        @enderror
                        <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">សូមបញ្ជូលលេខសម្រាប់តម្រៀបមីនុយតាមដាប់ :</span></label>
                        <input placeholder="សូមបញ្ជូលលេខយ៉ាងតិច១" style="font-family: 'Siemreap', cursive;" type="text" name="order_by" value="{{old('order_by',$menus->order_by)}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('order_by')
                        <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                        @enderror
                        <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ស្ថានភាព :</span></label>
                        <select name="status" class="form-select" style="font-family: 'Siemreap', cursive;">
                            @if(old('status',$menus->status) == 1)
                                <option selected value="1" style="font-family: 'Siemreap', cursive;">បង្ហាញ</option>
                                <option value="2" style="font-family: 'Siemreap', cursive;">មិនបង្ហាញ</option>
                            @else
                                <option value="1" style="font-family: 'Siemreap', cursive;">បង្ហាញ</option>
                                <option selected value="2" style="font-family: 'Siemreap', cursive;">មិនបង្ហាញ</option>
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success form-control"><i class="fas fa-save"></i> <span style="font-family: 'Siemreap', cursive;">កែឥឡូវ</span></button>
                </form>
            </div>
        </div>

    </div>
    <div class="col-2"></div>
    </div>
</div>
@endsection
