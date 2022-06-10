@extends('layouts.main')
@section('content')
<div class="container">
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="FormControlInput1" class="form-label">Title</label>
            <input type="text" name='title' class="form-control" id="FormControlInput1" placeholder="Title">
        </div>
        <div class="mb-3">
            <label for="FormControlTextarea1" class="form-label">Content</label>
            <textarea name='content' class="form-control" id="FormControlTextarea1" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label for="FormControlInput2" class="form-label">LinkImage</label>
            <input name='image' type="text" class="form-control" id="FormControlInput2" placeholder="linl...">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
