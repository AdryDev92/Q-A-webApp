
<table class="table table-striped">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Pregunta</th>
        <th scope="col">Fecha de creación</th>
        <th scope="col">Añadir</th>
        <th scope="col">Editar</th>
        <th scope="col">Borrar</th>
    </tr>
    </thead>
    <tbody>
    @foreach($questions as $question)
    <tr>
        <td><a href="/questions/{{$question->slug }}">{{$question->title}}</a></td>
        <td>{{$question->created_at}}</td>
        <td><button data-type="add" data-idElement="{{$question->id}}" class="btn btn-primary">Añadir</button></td>
        <td><button data-type="edit" data-idElement="{{$question->id}}" class="btn btn-warning">Editar</button></td>
        <td><button data-type="delete" data-idElement="{{$question->id}}" class="btn btn-danger">Borrar</button></td>
    </tr>
    @endforeach
    </tbody>
</table>