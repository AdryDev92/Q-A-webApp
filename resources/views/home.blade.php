@extends('public.layouts.app')

@section('content')
    <div class="container justify-content-center">
        <h1>
            Bienvenido al lugar donde encontrarás respuesta a todas tus preguntas
        </h1>
    </div>

    <div class="container">
        @include('public.questions.viewQuestion')
        <div>
            <ul class="pagination justify-content-center">
                {{ $questions->links() }}
            </ul>
        </div>
    </div>
@endsection
