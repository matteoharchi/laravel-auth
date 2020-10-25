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
<form action="{{route('posts.update', $post->id)}}" method="post">
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
  <div class="form-group">
    @foreach($tags as $tag)
      <label for="tag">{{$tag->name}}</label>
      <input type="checkbox" name="tags[]" value="{{$tag->id}}">
    @endforeach
  </div>
  <div class="form-group">
  <label for="img">Immagine</label>
  <input type="file" name="img" class="form-control-file" accept="image/*">
  </div>
    <button type="submit" class="btn btn-primary mb-2">Invia</button>
</form>

@endsection