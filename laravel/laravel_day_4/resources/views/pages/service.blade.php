@extends('layouts.app')

@section('content')
    <h2>{{$title}}</h2>
    @if(count($laguages) > 0)
        <ul>
            @foreach ($laguages as $laguage)
                <li class='list-group-item'>{{ $laguage }}</li>
            @endforeach
        </ul>
    @endif
@endsection