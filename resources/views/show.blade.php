@extends('layouts/app')
@section('content')
<div class="row">
    <div class="col-md-6">

        <div class="cover_img text-center">
            <h5>Cover:</h5>
            <img src="./../cover/{{$articles->cover}}" class="img-fluid" alt="">
        </div>

        <div>
            <h2 class="m-2">{{$articles->title}}</h2>
            <p class="m-2"> {{$articles->description}}</p>
            <p class="m-2"></p>{{$articles->text}}</p>
        </div>
    </div>
    <div class="col-md-6">
        <p>Images:</p>
        <div class="show_img">
            @foreach($articles->images as $img)
                <div class="view_images">
                    <img src="./../images/{{$img->image}}" class="img-fluid m-2 img" alt="">
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
