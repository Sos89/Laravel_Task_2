@extends('layouts.app')

@section('content')
    <div class="form-group col-md-3 m-auto">
        <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="title"> Title
                <input type="text" class="form-control my-3 @error('title') is-invalid @enderror" name="title" id="title">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </label>
            <label for="desc"> Short Description
                <input type="text" class="form-control my-3 @error('description') is-invalid @enderror" name="description" id="desc">
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </label>
            <label for="text"> Text
                <textarea name="text" id="text" cols="34" class="form-control my-3 @error('text') is-invalid @enderror"></textarea>
                @error('text')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </label> <br>
            <label for="cover"> Cover Image
                <input type="file" class="form-control my-3 @error('cover') is-invalid @enderror" name="cover" id="cover" >
                @error('cover')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </label> <br>
            <label for="image">Image
                <input type="file" class="form-control my-3 @error('images') is-invalid @enderror" name="images[]" id="image" multiple>
                @error('images')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </label> <br>
            <button type="submit" class="btn btn-outline-success btn-sm my-3">Create</button>
        </form>
    </div>
@endsection

