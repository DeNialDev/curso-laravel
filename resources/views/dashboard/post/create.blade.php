@extends('dashboard.layout')
@section('content')
    <h1>Crear post</h1>
    @include('dashboard.fragments._errors')
    <form action="{{ route('post.store') }}" method="post">
        @include('dashboard.post._form')
    </form>
@endsection
