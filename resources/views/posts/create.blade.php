<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('post.store')}}" method="post">
        @csrf
        title : <input type="text" name="title" value="{{old('title')}}"><br>
        desc : <input type="text" name="desc" value="{{old('desc')}}"><br>
        content : <input type="text" name="content" value="{{old('content')}}"> <br>
        <input type="number" name="user_id" value="{{auth()->user()->id}}" hidden>
        <input type="submit"><br>
        @if($errors->any())
            @foreach($errors->all() as $error)
                {{$error}} <br>
            @endforeach
        @endif
    </form>
    <br><br>
    <a href="{{route('home')}}"><h1>home</h1></a>
</body>
</html>
