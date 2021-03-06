<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Много текста</title>
</head>
<body>
    <div class="container mb-3 mt-3">
        <div class="row">
            <div class="col"><a class="btn btn-dark" role="button" href="{{route('post.index')}}">Posts</a></div>
            <div class="col"><a class="btn btn-dark" role="button" href="{{route('post.create')}}">Create</a></div>
            <div class="col"><a class="btn btn-dark" role="button" href="{{route('list.index')}}">List</a></div>
            <div class="col"><a class="btn btn-dark" role="button" href="{{route('contact.index')}}">Contact</a></div> 
            <div class="col"><a class="btn btn-dark" role="button" href="{{route('about.index')}}">About</a> </div>
            @can('view',auth()->user())
            <div class="col"><a class="btn btn-dark" role="button" href="{{route('admin.post.index')}}">Admin</a> </div>
            @endcan
        </div>
    </div>
    <div>
        @yield('content')
    </div>
</body>
</html>