@extends('layouts.app')

@section('content')
    <div class="form-group col-md-3 m-auto">
        <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="title"> Title
                <input type="text" class="form-control my-3 @error('title') is-invalid @enderror" name="title" id="title">
            </label>
            <label for="desc"> Short Description
                <input type="text" class="form-control my-3 @error('description') is-invalid @enderror" name="description" id="desc">
            </label>
            <label for="text"> Text<textarea name="text" id="text" cols="34" class="form-control my-3 @error('text') is-invalid @enderror"></textarea>
            </label> <br>
            <label for="cover"> Cover Image
                <input type="file" class="form-control my-3 @error('cover') is-invalid @enderror" name="cover" id="cover" >
            </label> <br>
            <label for="image">Image
                <input type="file" class="form-control my-3 @error('images') is-invalid @enderror" name="images[]" id="image" multiple>
            </label> <br>
            <button type="submit" class="btn btn-outline-success btn-sm my-3">Create</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection

