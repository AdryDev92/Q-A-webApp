@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            Bienvenido al lugar donde encontrarás respuesta a todas tus preguntas
        </h1>
    </div>

    <div class="container">
        @include('questions.viewQuestion')
            <nav aria-label="Page navigation example">
                {{ $questions->links() }}
            </nav>
    </div>
@endsection
