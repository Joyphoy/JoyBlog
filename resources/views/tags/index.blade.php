@extends('app')

@section('content')
    <h1>Tags</h1>
    <hr/>

    @foreach($tags as $tag)
        <h4>
            <a href="{{ route('tags.show', $tag->name) }}">{{ $tag->name }}</a>
        </h4>
    @endforeach
@stop
