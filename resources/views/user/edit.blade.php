@extends('daskboard')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <a href="{{route('user.index')}}" class="btn btn-primary"><i class="nav-icon fas fa-arrow-left"></i> <span style="font-family: 'Siemreap', cursive;">បញ្ជីអ្នកប្រើប្រាស់</span></a>
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
                    <div class="card">
                        <div class="card-header">
                            <h3><span style="font-family: 'Siemreap', cursive;">កែអ្នកប្រើប្រាស់</span></h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.update',$users->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">តួនាទី :</span></label>
                                <select name="role" id="" class="form-control" style="font-family: 'Siemreap', cursive;">
                                    <option value="">-----សូមជ្រើសរើសតួនាទីមួយ-----</option>
                                    @foreach($roles as $role)
                                        @if(old('role',$users->role_id) == $role->id)
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
                                <input placeholder="សូមបញ្ជូលឈ្មោះអ្នកប្រើប្រាស់យ៉ាងតិច៣តួរអក្សរ" style="font-family: 'Siemreap', cursive;" type="text" name="name" value="{{old('name',$users->name)}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('name')
                                <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                {{-- <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ពាក្យសម្ងាត់ :</span></label>
                                <br><input placeholder="សូមបញ្ជូលពាក្យសម្ងាត់ថ្មីយ៉ាងតិច៣តួរ" style="font-family: 'Siemreap', cursive;" type="text" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('password')
                                <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">អុីម៉ែល :</span></label>
                                <input placeholder="សូមបញ្ជូលអុីម៉ែល" style="font-family: 'Siemreap', cursive;" type="email" name="email" value="{{old('email',$users->email)}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('email')
                                <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror --}}
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">លេខទូរស័ព្ទ :</span></label>
                                <input placeholder="សូមបញ្ជូលលេខទូរស័ព្ធយ៉ាងតិច៩តួរ" style="font-family: 'Siemreap', cursive;" type="text" name="phone" value="{{old('phone','0'.$users->phone)}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('phone')
                                <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">រូបភាព :</span></label>
                                <input type="file" name="image"><br>
                                @if($users->image)
                                    <img src="{{asset('uploads/images_user/'.$users->image)}}" width="100" height="100"><br>
                                @else
                                    <img src="{{asset('uploads/extension_file/img.jpg')}}" width="100" height="100"><br>
                                @endif
                                @error('image')
                                <br><span class="text-danger" style="font-family: 'Siemreap', cursive;">{{ $message }}</span><br>
                                @enderror
                                <br><label for="exampleInputEmail1" class="form-label"><span style="font-family: 'Siemreap', cursive;">ស្ថានភាព :</span></label>
                                <select name="status" class="form-select" style="font-family: 'Siemreap', cursive;">
                                    @if($users->status == 1)
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
                <div class="col-3"></div>
            </div>
        </div>
@endsection
