@extends('layouts.app')
@section('content')
<h1>Editar libro</h1>

@if($errors->any())
  <div class="aviso">{{ $errors->first() }}</div>
@endif

<div class="ficha">
  <form method="POST" action="{{ route('libros.update', $libro) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('libros.form')
  </form>
</div>
@endsection
