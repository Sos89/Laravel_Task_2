@extends('layouts/app')
@section('content')
<div class="row">
    <div class="col-md-8">
        <h5>Cover:</h5>
        <img src="./../cover/{{$articles->cover}}" class="img-fluid" style="max-width: 100px; max-height: 100px" alt="">
        <div>
            <h3 class="m-2">{{$articles->title}}</h3>
            <p class="m-2"> {{$articles->description}}</p>
            <p class="m-2"></p>{{$articles->text}}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="show_img">
            <p>Images:</p>
            <div>
                @foreach($articles->images as $img)
                    <img src="./../images/{{$img->image}}" class="img-fluid m-2" style="max-width: 100px; max-height: 100px" alt="">
                @endforeach
            </div>

        </div>
    </div>
</div>

@endsection
