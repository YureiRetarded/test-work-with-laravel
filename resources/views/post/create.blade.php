@extends('layouts.main')
@section('content')
<div class="container">
    <div class="mb-3">
        <label for="FormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" id="FormControlInput1" placeholder="Title">
    </div>
    <div class="mb-3">
        <label for="FormControlTextarea1" class="form-label">Content</label>
        <textarea class="form-control" id="FormControlTextarea1" rows="5"></textarea>
    </div>
    <div class="mb-3">
        <label for="FormControlInput2" class="form-label">LinkImage</label>
        <input type="text" class="form-control" id="FormControlInput2" placeholder="linl...">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="Public">
        <label class="form-check-label" for="Public">Public?</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
@endsection
