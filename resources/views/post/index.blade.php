@extends('layouts.main')
@section('content')
<div class="container">
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
            @foreach($posts as $post)
                    <tr onclick="location.href='{{route('post.show',$post->id)}}'">
                        <th scope="col">{{$post->id}}</td>
                        <th scope="col">{{$post->title}}</td>
                        <th scope="col">{{$post->post_content}}</td>
                        <th scope="col">{{$post->image}}</td>
                        <th scope="col">{{$post->likes}}</td>
                    </tr>
            @endforeach
        </tbody>
        </table>
        <div>
            {{$posts->links()}}
        </div>
</div>
@endsection
