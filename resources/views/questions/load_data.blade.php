@extends('layouts.app')
@push('scripts')
    <script src="{{ asset('js/validation.js') }}" defer></script>
@endpush

@section('content')
    <div class="container">
        <button class="btn btn-primary" id="cargar">Cargar datos</button>
        <button class="btn btn-primary" id="cargarUno">Cargar cada uno</button>
    </div>

    <div id="listadoQuestion">

    </div>
    @endsection