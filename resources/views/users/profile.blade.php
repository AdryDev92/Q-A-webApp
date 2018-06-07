@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('js/validation.js') }}" defer></script>
@endpush

@section('content')
    <div class="container">
        <h1>Perfil de {{ Auth::user()->nick }}</h1>
        <span class="col-1"></span>
        <div class="row">
            <div class="col-3">
                @include('users.aside_menu_nav')
            </div>
            <div class="col-9">
                @include('users.postList')
            </div>
        </div>
    </div>
@endsection