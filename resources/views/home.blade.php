@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="google_search">
                    <div class="for_logo_google m-auto">
                        <img src="./../img/download.png" alt="">
                    </div>
                    <form action="/search" method="get" class="text-center">
                        @csrf
                        <div id="search_div">
                            <i class="fa-solid fa-magnifying-glass" id="search_icon"></i>
                            <input type="text" class="form-control m-auto search_input" name="search">
                            <i class="fa-solid fa-microphone" id="microphone"></i>
                        </div>
                        <button type="submit" class="btn btn-outline-success btn-sm" id="search_button">Google Search</button>
                    </form>
                </div>

                <div class="col-md-12">
                    @if(isset($articles))
                        @foreach($articles as $article)
                            <h4><a href=" /show/{{$article->id }}">{{$article->title}}</a></h4>
                            <p>{{$article->description}}</p>
                       @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
