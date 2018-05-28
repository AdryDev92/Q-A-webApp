@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="margin-bottom: 1em">
            Bienvenido al lugar donde encontrarás respuesta a todas tus preguntas
        </h1>
    </div>

    <div class="container">
        @foreach($questions as $question)
            <div class="card" style="margin-bottom: 2em">
                <div class="card-header">
                    <h2 class="card-title">
                        <a href="/questions/{{$question->slug }}">{{$question->title}}</a>
                    </h2>
                    <p class="card-subtitle"><em>{{$question->category}}</em></p>
                    <p class="card-subtitle">{{$question->hashtag}}</p>
                </div>
                <p class="card-body">{{$question->content}}</p>
            </div>
        @endforeach

            <nav aria-label="Page navigation example">
                {{ $questions->links() }}
            </nav>
    </div>
@endsection
