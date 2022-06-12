@extends('layouts.main')
@section('content')
<div class="container">
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="FormControlInput1" class="form-label">Title</label>
            <input type="text" value="{{old('title')}}" name='title' class="form-control" id="FormControlInput1" placeholder="Title">
            @error('title')
                <p class="text-danger">{{$message}}</p>

            @enderror
        </div>
        <div class="mb-3">
            <label for="FormControlTextarea1" class="form-label">Content</label>
            <textarea name='post_content' class="form-control" id="FormControlTextarea1" rows="5">{{old('post_content')}}</textarea>
            @error('post_content')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category">Category</label>
            <select class="form-select" aria-label="select category" name='category_id'>
                @foreach ($catogories as $category)
                <option
                    {{old('category_id')==$category->id?'selected':''}}
                    value={{$category->id}}>{{$category->title}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tags">Tags</label>
            <select class="form-select" multiple aria-label="select tags" name="tags[]">
                @foreach ($tags as $tag)
                <option  value={{$tag->id}}>{{$tag->title}}</option>
                @endforeach
            </select>
            @error('tags[]')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="FormControlInput2" class="form-label">LinkImage</label>
            <input name='image' value="{{old('image')}}" type="text" class="form-control" id="FormControlInput2" placeholder="linl...">
            @error('image')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
