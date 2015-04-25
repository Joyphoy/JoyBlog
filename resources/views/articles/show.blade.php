@extends('app')

@section('content')
    <article>
        <h1>
            {{ $article->title }}
            @if(Auth::id() == $article->user->id)
                <small><a href="{{ route('articles.edit', $article->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></small>
            @endif
        </h1>

        <h4><small>
            {{ $article->created_at->diffForHumans() }} by <a href="{{ route('users.articles.index', $article->user->id) }}">{{ $article->user->name }}</a>
        </small></h4>
        <hr/>

        <p>{{ $article->body }}</p>
    </article>

    @unless($article->tags->isEmpty())
        <ul class="list-inline list-unstyled">
            <li><h5>Tags:</h5></li>
            @foreach($article->tags as $tag)
                <li><a href="{{ route('tags.show', $tag->name) }}">{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    @endunless
@stop
