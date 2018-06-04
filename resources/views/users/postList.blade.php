
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
        <td><a class="" href="">
                <i class="far fa-edit fa-2x text-info"></i>
            </a></td>
        <td><a class="" href="">
                <i class="fas fa-trash-alt fa-2x text-danger"></i>
            </a></td>
    </tr>
    @endforeach
    </tbody>
</table>