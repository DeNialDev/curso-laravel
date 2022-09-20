@extends('dashboard.layout')
@section('content')
    <h1>Crear post</h1>
    @include('dashboard.fragments._errors')
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        <label for="">Titulo</label>
        <input type="text" name="title">
        <label for="">Slug</label>
        <input type="text" name="slug">
        <label for="">Contenido</label>
        <textarea name="content"></textarea>
        <label for="">Description</label>
        <textarea name="description"></textarea>
        <label for="">Categoria</label>
        <select name="category_id">
            <option></option>
            @foreach($categories as $title => $id)
                <option value="{{$id}}">{{$title}}</option>
            @endforeach
        </select>
        <label for="">Posteado</label>
        <select name="posted" id="">
            <option value="yes">Sí</option>
            <option value="not">No</option>
        </select>
        <button type="submit">Enviar</button>
    </form>
@endsection
