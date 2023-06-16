@extends('layouts.head')

@section('content')
    <center>
        @foreach($posts as $post)
            {{$post['title'] . ' ' . $post['desc'] . ' ' }} <a href="{{route('delete',$post['id'])}}">delete</a> <br>
        @endforeach
    </center>
@endsection
