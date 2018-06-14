@extends('layouts.app')
@section('content')
    <div class="container">
        @include('partials.structure_question')
        @foreach( $question->comments as $comment)
            {{ $comment->content }}
            <p></p>
        @endforeach
        @include('partials.comments')
    </div>
@endsection
