@extends('layouts.app')
@section('content')
<h1>Agregar autor</h1>
@if($errors->any())<div class="aviso">{{ $errors->first() }}</div>@endif
<div class="ficha">
  <form method="POST" action="{{ route('autores.store') }}">
    @csrf
    @include('autores.form')
  </form>
</div>
@endsection
