@extends('layouts.app')

@section('content')
    <div class="container justify-content-center">
        <h1>
            Bienvenido al lugar donde encontrarás respuesta a todas tus preguntas
        </h1>
    </div>

    <div class="container">
        @include('questions.viewQuestion')
        <a class="" href="">
            <i class="fas fa-arrow-down fa-3x"></i>
        </a>


        <div>
            <ul class="pagination justify-content-center">
                {{ $questions->links() }}
            </ul>
        </div>
    </div>
@endsection
