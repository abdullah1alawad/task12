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
            {{$post['title'] . ' ' . $post['desc'] . '   ' . $post['user_id']}}
            <a href="{{route('admin.delete',$post['id'])}}">soft delete</a> <br>
        @endforeach
            <a href="{{route('home')}}"><h1>home</h1></a>
    </center>
</body>
</html>
