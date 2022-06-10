@extends('layouts.main')
@section('content')
<div class="container">
    <form action="{{route('post.update',$post->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="FormControlInput1" class="form-label">Title</label>
            <input type="text" name='title' class="form-control" id="FormControlInput1" placeholder="Title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="FormControlTextarea1" class="form-label">Content</label>
            <textarea name='content' class="form-control" id="FormControlTextarea1" rows="5">{{$post->content}}</textarea>
        </div>
        <div class="mb-3">
            <label for="FormControlInput2" class="form-label">LinkImage</label>
            <input name='image' type="text" class="form-control" id="FormControlInput2" value="{{$post->image}}" placeholder="linl...">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
