@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Menú de {{ Auth::user()->nick }}</h1>

        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Preguntas</li>
                <li class="list-group-item">Media</li>
                <li class="list-group-item">Configuración</li>
            </ul>
        </div>

        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                @foreach($questions as $question)
                    <li class="list-group-item">{{$question->id}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection