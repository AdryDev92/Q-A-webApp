<table class="table table-striped">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Pregunta</th>
        <th scope="col">Fecha de creación</th>
        <th scope="col">Editar</th>
        <th scope="col">Borrar</th>
    </tr>
    </thead>
    <tbody>
    @foreach($questions as $question)
        <tr>
            <td><a href="/questions/{{$question->slug }}">{{$question->title}}</a></td>
            <td>{{$question->created_at}}</td>
            <td>
                <a class="" href="/questions/update/{{$question->slug}}">
                    <i class="far fa-edit fa-2x text-info"></i>
                </a>
            </td>

            <td>
                <form action="/questions/destroy/{{ $question->id }}" method="post">
                    <input type="hidden" name="_method" value="delete"/>
                    {!! csrf_field() !!}
                </form>
                <a class="" data-type="delete" href="#">
                    <i data-idelement="{{$question->id}}" class="fas fa-trash-alt fa-2x text-danger"></i>
                </a>
                @include('partials.modal_delete')
            </td>
        </tr>
    @endforeach
    @if (session('deleted'))
        <div class="alert alert-danger">
            {{ session('deleted') }}
        </div>
    @endif
    </tbody>
</table>