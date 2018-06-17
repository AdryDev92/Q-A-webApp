@extends('public.layouts.app')
@push('scripts')
    <script src="{{ asset('js/validation.js') }}" defer></script>
    <script src="{{asset('js/update.js')}}"></script>
@endpush

@section('content')
    @include('users.settings')
@endsection



