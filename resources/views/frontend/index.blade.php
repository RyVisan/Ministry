@extends('index')
@section('content')
    <div class="col-lg-9 col-12 mt-2">
{{--        start slide--}}
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($imgSlides as $imgSlide)
                <div class="carousel-item @if($loop->first) active @endif" data-bs-interval="10000">
                    <img src="{{asset('uploads/images_slide/'.$imgSlide->image)}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h4><span style="font-family: 'Siemreap', cursive; background: white; opacity: 0.8;">{{$imgSlide->slide_title}}</span></h4>
                        <p><span style="font-family: 'Siemreap', cursive; background: white; opacity: 0.8;">{{$imgSlide->description}}</span></p>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
{{--        end slide--}}

{{--        start below_slide--}}
        <div class="row mt-2">
            @foreach($belowSlides as $document)
            <div class="col-lg-6 col-12">
                <div class="card">
                    @if($document->image)
                        <img src="{{asset('uploads/images_document/'.$document->image)}}" class="card-img-top">
                    @else
                        <img src="{{asset('uploads/extension_file/img.jpg')}}" class="card-img">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title"><span style="font-family: 'Siemreap', cursive;">{{$document->name}}</span></h5>
                        <p class="card-text"><span style="font-family: 'Siemreap', cursive;">{{$document->description}}</span></p>
                        <p class="card-text"><small class="text-muted"><span style="font-family: 'Siemreap', cursive;" class="text-danger">{{Carbon\Carbon::parse($document->created_at)->diffForHumans()}}</span></small></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
{{--        end below_slide--}}

{{--        start above_foot--}}
        @if(count($other) > 0)
        <br><h3><span style="font-family: 'Siemreap', cursive; color: black;">កម្មវិធីផ្សេងៗ</span></h3>
        <hr style="border-bottom: 10px solid black;">
        <div class="row">
            @foreach($other as $document)
                @if($document-> status == 1)
                    <div class="col-lg-12">
                        <div class="card mt-2" style="max-width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-2">
                                    @if($document->image)
                                        <img src="{{asset('uploads/images_document/'.$document->image)}}" class="img-fluid rounded-start" alt="...">
                                    @else
                                        <img src="{{asset('uploads/extension_file/img.jpg')}}" class="card-img">
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title"><span style="font-family: 'Siemreap', cursive;">{{$document->name}}</span></h5>
                                        <p class="card-text"><span style="font-family: 'Siemreap', cursive;">{{$document->description}}</span></p>
                                        <p class="card-text"><small class="text-muted"><span style="font-family: 'Siemreap', cursive;" class="text-danger">{{Carbon\Carbon::parse($document->created_at)->diffForHumans()}}</span></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        @endif
{{--        end above_foot--}}

{{--        start printed_doc--}}
        @if(count($printed_doc) > 0 )
        <br><h3><span style="font-family: 'Siemreap', cursive; color: black;">ឯកសារបោះពុម្ភ</span></h3>
        <hr style="border-bottom: 10px solid black;">
        <div class="row mt-2">
            @foreach($printed_doc as $printed)
                <div class="col-6 col-lg-2">
                    <div class="card">
                        @if($printed->image)
                            <img src="{{asset('uploads/images_document/'.$printed->image)}}" class="card-img-top">
                        @else
                            <img src="{{asset('uploads/extension_file/img.jpg')}}" class="card-img">
                        @endif
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title"><span style="font-family: 'Siemreap', cursive;">{{$printed->name}}</span></h5>--}}
{{--                            <p class="card-text"><span style="font-family: 'Siemreap', cursive;">{{$printed->description}}</span></p>--}}
{{--                            <p class="card-text"><small class="text-muted"><span style="font-family: 'Siemreap', cursive;" class="text-danger">{{Carbon\Carbon::parse($printed->created_at)->diffForHumans()}}</span></small></p>--}}
{{--                        </div>--}}
                    </div>
                </div>
            @endforeach
        </div>
        @endif
{{--        end printed_doc--}}
    </div>


{{--    start right_slide--}}
    <div class="col-12 col-lg-3">
        @foreach($right_slide as $document)
            @if($document->status == 1)
            <div class="card mt-2" style="width: 18rem;">
                @if($document->image)
                    <img src="{{asset('uploads/images_document/'.$document->image)}}" class="card-img-top">
                @else
                    <img src="{{asset('uploads/extension_file/img.jpg')}}" class="card-img-top">
                @endif
                <div class="card-body">
                    <div class="card-title">
                        <h5><span style="font-family: 'Siemreap', cursive;">{{$document->name}}</span></h5>
                    </div>
                    <p class="card-text"><span style="font-family: 'Siemreap', cursive;">{{$document->description}}</span></p>
                    <p class="card-text"><small class="text-muted"><span style="font-family: 'Siemreap', cursive;" class="text-danger">{{Carbon\Carbon::parse($document->created_at)->diffForHumans()}}</span></small></p>
                </div>
            </div>
            @endif
        @endforeach
    </div>
{{--    end right_slide--}}
@endsection
