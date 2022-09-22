@extends('dashboard.layout')
@section('content')
    <h1>Editar category: {{$category->title}}</h1>
    @include('dashboard.fragments._errors')
    <form action="{{ route('category.update', $category->id) }}" method="post" >

        @method('PATCH')
        @include('dashboard.category._form')


    </form>
@endsection
