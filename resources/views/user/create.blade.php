@extends('daskboard')
@section('function', 'បង្កើតអ្នកប្រើប្រាស់')
@section('settingOpen', 'menu-open')
@section('Setting', 'active')
@section('userI', 'active')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <a href="{{route('user.index')}}" class="btn btn-danger"><i class="nav-icon fas fa-arrow-left"></i> <span style="font-family: 'Siemreap', cursive;">បញ្ជីអ្នកប្រើប្រាស់</span></a>
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
                <div class="col-3"></div>
                <div class="col-6 justify-content-center">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><span style="font-family: 'Siemreap', cursive;">{{session('success')}}</span></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3><span style="font-family: 'Siemreap', cursive;">បង្កើតអ្នកប្រើប្រាស់ថ្មី</span></h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.save')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">តួនាទី :</span></label>
                                <select name="role" id="" class="form-control" style="font-family: 'Siemreap', cursive;">
                                    <option value="">-----សូមជ្រើសរើសតួនាទីមួយ-----</option>
                                    @foreach($roles as $role)
                                        @if(old('role') == $role->id)
                                            <option selected value="{{$role->id}}">{{$role->name}}</option>
                                        @else
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('role')
                                <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ឈ្មោះអ្នកប្រើប្រាស់ :</span></label>
                                <input placeholder="សូមបញ្ជូលឈ្មោះអ្នកប្រើប្រាស់យ៉ាងតិច៣តួរអក្សរ" style="font-family: 'Siemreap', cursive;" type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('name')
                                    <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ពាក្យសម្ងាត់ :</span></label>
                                <br><input placeholder="សូមបញ្ជូលពាក្យសម្ងាត់យ៉ាងតិច៣តួរ" style="font-family: 'Siemreap', cursive;" type="text" name="password" value="{{old('password')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('password')
                                    <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">អុីម៉ែល :</span></label>
                                <input placeholder="សូមបញ្ជូលអុីម៉ែល" style="font-family: 'Siemreap', cursive;" type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('email')
                                    <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">លេខទូរស័ព្ទ :</span></label>
                                <input placeholder="សូមបញ្ជូលលេខទូរស័ព្ធយ៉ាងតិច៩តួរ" style="font-family: 'Siemreap', cursive;" type="text" name="phone" value="{{old('phone')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('phone')
                                <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">រូបភាព :</span></label>
                                <input type="file" name="image"><br>
                                @error('image')
                                    <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ស្ថានភាព :</span></label>
                                <select name="status" class="form-select" style="font-family: 'Siemreap', cursive;">
                                    <option @if(old('status') == 1) selected @endif value="1" style="font-family: 'Siemreap', cursive;">បង្ហាញ</option>
                                    <option @if(old('status') == 2) selected @endif value="2" style="font-family: 'Siemreap', cursive;">មិនបង្ហាញ</option>
                                </select>
                                <br><button type="submit" class="btn btn-primary form-control"><i class="fas fa-save"></i> <span style="font-family: 'Siemreap', cursive;">រក្សាទុក</span></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
        @endsection
