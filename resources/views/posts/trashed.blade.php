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
    <center>
        @foreach($posts as $post)
            {{$post['title'] . ' ' . $post['desc'] . ' '}} <a href="{{route('force.delete',$post['id'])}}">delete</a> <span>  </span>
            <a href="{{route('restore',$post['id'])}}">restore</a> <br>
        @endforeach
        <br><br><br>
        <a href="{{route('home')}}"><h1>home</h1></a>
    </center>

</body>
</html>
