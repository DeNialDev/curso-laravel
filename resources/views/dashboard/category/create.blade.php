@extends('dashboard.layout')
@section('content')
    <h1>Crear category</h1>
    @include('dashboard.fragments._errors')
    <form action="{{ route('category.store') }}" method="post">
        @include('dashboard.category._form')
    </form>
@endsection
