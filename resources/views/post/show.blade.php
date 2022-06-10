@extends('layouts.main')
@section('content')
<div class="container">
    <a href="{{route('post.index')}}" class="btn btn-dark" role="button">Back</a>
    <a href="{{route('post.edit',$post->id)}}" class="btn btn-dark" role="button">Edit</a>
    <form action="{{route('post.delete',$post->id)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger mb-3 mt-3" role="button">Delete</button>
    </form>
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Image</th>
                <th scope="col">Likes</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <th scope="col">{{$post->id}}</td>
                    <th scope="col">{{$post->title}}</td>
                    <th scope="col">{{$post->content}}</td>
                    <th scope="col">{{$post->image}}</td>
                    <th scope="col">{{$post->likes}}</td>
                </tr>
        </tbody>
        </table>
</div>
@endsection
