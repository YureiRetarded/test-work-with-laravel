@extends('layouts.main')
@section('content')
<div class="container">
    <table class="table table-dark table-striped">
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
            @foreach($posts as $post)
                <tr>
                    <th scope="col">{{$post->id}}</td>
                    <th scope="col">{{$post->title}}</td>
                    <th scope="col">{{$post->content}}</td>
                    <th scope="col">{{$post->image}}</td>
                    <th scope="col">{{$post->likes}}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
</div>
@endsection
