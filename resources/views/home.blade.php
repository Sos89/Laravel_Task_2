@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="google_search">
                    <div class="for_logo_google m-auto">
                        <img src="./../img/download.png" alt="">
                    </div>
                    <form action="{{ route('search') }}" method="get" class="text-center">
                        @csrf
                        <div id="search_div">
                            <i class="fa-solid fa-magnifying-glass" id="search_icon"></i>
                            <input type="text" class="form-control m-auto search_input" name="search">
                            <i class="fa-solid fa-microphone" id="microphone"></i>
                        </div>
                        <button type="submit" class="btn btn-outline-success btn-sm" id="search_buuton">Google Search</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
