@extends('layouts/app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{--        <table class="table">--}}
                {{--            <thead>--}}
                {{--            <tr>--}}
                {{--                <th>id</th>--}}
                {{--                <th>Title</th>--}}
                {{--                <th>Description</th>--}}
                {{--                <th>Text</th>--}}
                {{--                <th>Image</th>--}}
                {{--            </tr>--}}
                {{--            </thead>--}}
                {{--            <tbody>--}}
                {{--            @foreach($posts as $post)--}}
                {{--                <tr>--}}
                {{--                    <th scope="row">{{$post->id}}</th>--}}
                {{--                    <td>{{$post->title}}</td>--}}
                {{--                    <td>{{$post->description}}</td>--}}
                {{--                    <td>{{$post->text}}</td>--}}
                {{--                    <td><img src="cover/{{$post->cover}}" class="img-fluid" style="max-width: 100px; max-height: 100px" alt=""></td>--}}
                {{--                </tr>--}}
                {{--            @endforeach--}}
                {{--            </tbody>--}}
                {{--        </table>--}}
                @foreach($articles as $article)
                    <h4><a href=" /show/{{$article->id }}">{{$article->title}}</a></h4>
                    <p>{{$article->description}}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
