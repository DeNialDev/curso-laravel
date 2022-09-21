@extends('dashboard.layout')
@section('content')
    <h1>Editar post: {{$post->title}}</h1>
    @include('dashboard.fragments._errors')
    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">

        @method('PATCH')
        @include('dashboard.post._form', ['task' => 'edit'])


    </form>
@endsection
