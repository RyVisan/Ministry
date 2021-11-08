<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('login_form')}}/style.css">
    <script src="{{asset('login_form/fontawesome/js/all.min.js')}}"></script>
    <title>Login</title>
</head>
<body>
    @if(session('fail'))
    <div class="container message">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><span style="font-family: 'Siemreap', cursive;">{{session('fail')}}</span></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(session('success'))
        <div class="container message">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><span style="font-family: 'Siemreap', cursive;">{{session('success')}}</span></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="card_custom">
        <form action="{{route('user.check')}}" method="post" autocomplete="off">
            @csrf
            <img src="{{asset('login_form')}}/image_2021-07-06_17-30-00.png" alt=""><br>

            <div class="mb-3">
                <input style="font-family: 'Siemreap', cursive;" name="email" value="{{old('email')}}" placeholder="អុីម៉ែល" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('email')
                    <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <input style="font-family: 'Siemreap', cursive;" name="password" placeholder="ពាក្យសម្ងាត់" type="password" class="form-control" id="exampleInputPassword1">
                @error('password')
                <span class="text-danger" style="font-family: 'Siemreap', cursive;">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success form-control" style="font-family: 'Siemreap', cursive;">ចូលទៅប្រើប្រាស់</button>
        </form>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
