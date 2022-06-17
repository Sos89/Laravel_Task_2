@extends('layouts.app')

@section('content')
    <div class="form-group col-md-3 m-auto">
        <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="title"> Title
                <input type="text" class="form-control" name="title" id="title">
            </label>
            <label for="desc"> Short Description
                <input type="text" class="form-control" name="description" id="desc">
            </label>
            <label for="text"> Text<textarea name="text" id="text" cols="34" class="form-control"></textarea>
            </label> <br>
            <label for="cover"> Cover Image
                <input type="file" class="form-control" name="cover" id="cover" >
            </label> <br>
            <label for="image">Image
                <input type="file" class="form-control" name="images[]" id="image" multiple>
            </label> <br>
            <button type="submit" class="btn btn-outline-success btn-sm">Create</button>
        </form>
    </div>
@endsection

