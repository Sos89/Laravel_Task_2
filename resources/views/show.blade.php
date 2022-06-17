@extends('layouts/app')
@section('content')
    <div class="col-md-8">
        <h3>Cover:</h3>
            <img src="./../cover/{{$articles->cover}}" class="img-fluid" style="max-width: 100px; max-height: 100px" alt="">
            <p>Images:</p>
            <div class="update_images">
                @foreach($articles->images as $img)
                        <img src="./../images/{{$img->image}}" class="img-fluid" style="max-width: 100px; max-height: 100px" alt="">
                @endforeach
            </div>
        <div>
            <p>{{$articles->title}}</p>
            <p>{{$articles->description}}</p>
            <p>{{$articles->text}}</p>
        </div>
    </div>
@endsection
