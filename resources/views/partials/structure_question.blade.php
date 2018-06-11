<div class="card" style="margin-bottom: 2em">
    <div class="card-header">
        <h2 class="card-title">
            <a href="/questions/{{$question->slug }}">{{$question->title}}</a>
        </h2>
        <p class="card-subtitle"><em>{{$question->category}}</em></p>
        <p class="card-subtitle">{{$question->hashtag}}</p>
    </div>
    <p class="card-body">{{$question->content}}</p>

    <p class="container">
        Creada el {{ $question->created_at }} — {{ $question->user->nick }}
    </p>
</div>