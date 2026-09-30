@extends('layouts.app')
@section('content')
<h1>Editar editorial</h1>
@if($errors->any())<div class="aviso">{{ $errors->first() }}</div>@endif
<div class="ficha">
  <form method="POST" action="{{ route('editores.update', $editor) }}">
    @csrf
    @method('PUT')
    @include('editores.form')
  </form>
</div>
@endsection
