@extends('layouts.app')

@section('content')
<form action="/questions/create" method="post">
{{ csrf_field() }}
<div class="form-group @if( $errors->has('content'))has-error @endif">
</div>
@if($errors->has('content'))
    @foreach($errors->get('content') as $message)
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @endforeach
@endif

<div class="container">
        <div class="form-group row">
            <div class="form-group col-12">
                <label for="title" class="glyphicon glyphicon-user">Título</label>
                <input type="text" placeholder="Escribe un título..." id="title" name="title" class="form-control">
                @if($errors->has('title'))
                    @foreach($errors->get('title') as $message)
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>


        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="category">Selecciona categoría</label>
                <select class="form-control" name="category" id="cateogry">
                    <option value="" selected>...</option>
                    <option value="option">Sociedad</option>
                    <option value="option">Tecnología</option>
                    <option value="option">Ciencia</option>
                    <option value="option">Cultura</option>
                    <option value="option">Ocio</option>
                    <option value="option">Deportes</option>
                    <option value="option">Moda</option>
                    <option value="option">General</option>
                </select>
                @if($errors->has('category'))
                    @foreach($errors->get('category') as $message)
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>


    <div class="form-group row">
        <div class="form-group col-md-6">
            <label for="hashtagInput">Etiquetas</label>
            <input type="text" placeholder="Escribe etiquetas..." id="hashtagInput" name="hashtag" class="form-control">
            @if($errors->has('hashtag'))
                @foreach($errors->get('hashtag') as $message)
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="content">Escribe tu pregunta</label>
                <textarea name="content" id="content"
                          placeholder="Máximo de " class="form-control" rows="10"></textarea>
        @if($errors->has('content'))
            @foreach($errors->get('content') as $message)
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endforeach
        @endif
    </div>
    <input type="submit" class="btn btn-primary">
</div>


</div>


</form>
    @endsection