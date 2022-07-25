@extends('layouts/app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Cover:</h3>
                <form action="/deleteCover/ {{ $articles->id }}" method="post">
                    @csrf
                    @method('delete')
                    <img src="./../cover/{{$articles->cover}}" class="img-fluid" style="max-width: 100px; max-height: 100px" alt="">
                    <button class="btn btn-outline-danger">x</button>
                </form>
                @if(count($articles->images)>0)
                    <p>Images:</p>
                    <div class="update_images">
                        @foreach($articles->images as $img)
                            <form action="/deleteImage/ {{ $img->id }}" method="post">
                                @csrf
                                @method('delete')
                                <img src="./../images/{{$img->image}}" class="img-fluid" style="max-width: 100px; max-height: 100px" alt="">
                                <button class="btn btn-outline-danger btn-sm">x</button>
                            </form>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="form-group col-md-4 m-auto">
                <form action="/update/ {{ $articles->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <label for="title"> Title
                        <input type="text" class="form-control my-3" name="title" value="{{ $articles->title }}" id="title">
                    </label>
                    <label for="desc"> Short Description
                        <input type="text" class="form-control my-3" name="description" value="{{ $articles->description }}" id="desc">
                    </label>
                    <label for="text"> Text<textarea name="text" id="text" class="form-control">{{$articles->text}}</textarea>
                    </label> <br>
                    <label for="cover"> Cover Image
                        <input type="file" class="form-control my-3" name="cover" id="cover" >
                    </label> <br>
                    <label for="image">Image
                        <input type="file" class="form-control" name="images[]" id="image" multiple>
                    </label> <br>
                    <button type="submit" class="btn btn-outline-success btn-sm my-3">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection
