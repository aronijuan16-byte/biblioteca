@extends('layouts.app')
@section('content')
<h1>Editar autor</h1>
@if($errors->any())<div class="aviso">{{ $errors->first() }}</div>@endif
<div class="ficha">
  <form method="POST" action="{{ route('autores.update', $autor) }}">
    @csrf
    @method('PUT')
    @include('autores.form')
  </form>
</div>
@endsection
