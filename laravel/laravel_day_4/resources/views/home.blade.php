@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-secondary">Create Post</a> 
                    <h3>Your bolg Posts</h3>
                    @if(count($posts)>0)
                    <table class='table table-striped'>
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post -> title }}</td>
                                <td><a href="/posts/{{ $post->id }}/edit" class='btn btn-info'>Edit</a></td>
                                <td>
                                    {!! Form::open(['action' => ['App\Http\Controllers\PostController@destroy', $post->id], 'method' => 'POST']) !!}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger float-right']) }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                    <small>No Posts found.</small>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
