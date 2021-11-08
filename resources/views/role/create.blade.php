@extends('daskboard')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <a href="{{route('role.index')}}" class="btn btn-primary"><i class="nav-icon fas fa-arrow-left"></i> <span style="font-family: 'Siemreap', cursive;">ត្រឡប់ទៅក្រោយ</span></a>
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
                            <h3><span style="font-family: 'Siemreap', cursive;">បង្កើតតួនាទីថ្មី</span></h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('role.save')}}" method="post" autocomplete="off">
                                @csrf
                                <label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ឈ្មោះតួនាទី :</span></label>
                                <input placeholder="សូមបញ្ជូលឈ្មោះតួនាទីយ៉ាងតិច៣តួរ" style="font-family: 'Siemreap', cursive;" type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('name')
                                    <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ការពិពណ៌នា :</span></label>
                                <textarea name="description" id="" cols="30" rows="4" class="form-control" style="font-family: 'Siemreap', cursive;">{{old('description')}}</textarea><br>
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
