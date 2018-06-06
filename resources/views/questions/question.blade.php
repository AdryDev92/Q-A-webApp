@extends('layouts.app')
@push('scripts')
    <script src="{{ asset('js/validation.js') }}" defer></script>
@endpush
@section('content')
    <div class="container">
        @include('partials.structure_question')
    </div>
@endsection
