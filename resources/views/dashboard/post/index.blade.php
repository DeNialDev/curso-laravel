@extends('dashboard.layout')


@section('content')
    <a href="{{route("post.create")}}">Crear</a>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Posted</th>
                <th>Acciones</th>
            </tr>
        </thead>
    <tbody>
        @foreach($posts as $p)
            <tr>
                <td>{{$p->title}}</td>
                <td>Categoria</td>
                <td>{{$p->posted}}</td>
                <td>
                    <a href="{{route("post.edit", $p)}}">Editar</a>
                    <a href="{{route("post.show", $p)}}">Ver</a>
                    <a href="{{route("post.destroy", $p)}}">Eliminar</a>


                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
    {{$posts->links()}}
@endsection
