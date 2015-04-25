@extends('app')

@section('content')
    <h1>Edit: {{ $article->title }}</h1>
    <hr/>

    {!! Form::model($article, ['method' => 'PATCH', 'route' => ['articles.update', $article->id]]) !!}
        @include('articles.form', ['submitButtonText' => 'Update article'])
    {!! Form::close() !!}

    {!! Form::open(['method' => 'DELETE', 'route' => ['articles.destroy', $article->id]]) !!}
        <div class="form-group">
            {!! Form::submit('Delete article', ['type' => 'submit', 'class' => 'btn btn-danger form-control']) !!}
        </div>
    {!! Form::close() !!}

    @include('errors.list')
@stop
