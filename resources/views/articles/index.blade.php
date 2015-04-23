@extends('app')

@section('content')
    <h1>Articles</h1>
    <hr/>

    @foreach($articles as $article)
        <article>
            <h2>
                <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
            </h2>

            <div class="body">{{ str_limit($article->body, 50) }}</div>
        </article>
    @endforeach

    {!! $articles->render() !!}
@stop
