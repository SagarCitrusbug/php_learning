@extends('layouts.app')

@section('content')
    <a href='/posts' class='btn btn-default'>Go Back</a>
    <h1>{{ $posts->title }}</h1>
    <small>Written on {{ $posts->created_at }}</small>
    <div>
        {!! $posts->body !!}
    </div>
    <hr>
    <a href='/posts/{{$posts->id}}/edit' class='btn btn-primary'>Edit</a>

    {!! Form::open(['action' => ['App\Http\Controllers\PostController@destroy', $posts->id], 'method' => 'POST']) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger float-right']) }}
    {!! Form::close() !!}
@endsection