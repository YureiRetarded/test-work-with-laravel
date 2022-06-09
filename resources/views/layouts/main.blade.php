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
    <div class="container">
        <div class="row">
            <div class="col"><a class="btn btn-dark" role="button" href="{{route('post.index')}}">Posts</a></div>
            <div class="col"><a class="btn btn-dark" role="button" href="{{route('list.index')}}">List</a></div>
            <div class="col"><a class="btn btn-dark" role="button" href="{{route('contact.index')}}">Contact</a></div> 
            <div class="col"><a class="btn btn-dark" role="button" href="{{route('about.index')}}">About</a> </div>
        </div>
    </div>
    <div>
        @yield('content')
    </div>
</body>
</html>