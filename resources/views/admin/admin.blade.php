@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Admin Page</h3>
                    </div>

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Text</th>
                                <th>Image</th>
                                <th>View</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <th scope="row">{{$article->id}}</th>
                                    <td>{{$article->title}}</td>
                                    <td>{{$article->description}}</td>
                                    <td>{{$article->text}}</td>
                                    <td><img src="cover/{{$article->cover}}" class="img-fluid"
                                             style="max-width: 100px; max-height: 100px" alt=""></td>
                                    <td><a class="btn btn-sm btn-info" href=" /show/{{$article->id }}">View</a></td>
                                    <td><a class="btn btn-sm btn-warning"
                                           href=" /edit/{{$article->id }}">Update</a>
                                    </td>
                                    <th>
                                        <form action="/delete/{{$article->id}} }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sore')"
                                                    class="btn btn-danger btn-sm">Delete
                                            </button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
