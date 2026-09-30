@extends('layouts.app')
@section('content')
<h1>Agregar editorial</h1>
@if($errors->any())<div class="aviso">{{ $errors->first() }}</div>@endif
<div class="ficha">
  <form method="POST" action="{{ route('editores.store') }}">
    @csrf
    @include('editores.form')
  </form>
</div>
@endsection
