@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('posts.update')}}" method="post">
@csrf
@method('PATCH')
  <div class="form-group">
    <label for="title">Titolo</label>
    <input type="text" name='title' class="form-control" placeholder="Inserisci il titolo" value="{{$post->title}}">
  </div>
  <div class="form-group">
    <label name='body' for="body">Corpo del post</label>
    <textarea class="form-control" name="body" rows="3" value="{{$post->body}}"></textarea>
  </div>
    <button type="submit" class="btn btn-primary mb-2">Invia</button>
</form>

@endsection