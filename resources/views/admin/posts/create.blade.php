@extends('layouts.app')

@section('content')

<form action="{{route('posts.store')}}" method="post">
@csrf
@method('POST')
  <div class="form-group">
    <label for="title">Titolo</label>
    <input type="text" name='title' class="form-control" placeholder="Inserisci il titolo">
  </div>
  <div class="form-group">
    <label name='body' for="body">Corpo del post</label>
    <textarea class="form-control" name="body" rows="3"></textarea>
  </div>
    <button type="submit" class="btn btn-primary mb-2">Invia</button>
</form>

@endsection