@extends('app')

@section('content')
    <h1>Create an article</h1>
    <hr/>

    {!! Form::open(['route' => 'articles.store']) !!}
        @include('articles.form', ['submitButtonText' => 'Create article'])
    {!! Form::close() !!}

    @include('errors.list')
@stop
