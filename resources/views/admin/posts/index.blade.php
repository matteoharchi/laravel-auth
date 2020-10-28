@extends('layouts.app')
@section('content')
<a href="{{route('posts.create')}}"><button class="create-button btn btn-primary">Crea Post</button></a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>
          <form action="{{route('posts.destroy', $post->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
          </form>
      </td>
      <td><a href="{{route('posts.edit', $post->id)}}">Edit</a></td>
    </tr>
      
  @endforeach
  </tbody>
</table>
{{ $posts->links() }}
@endsection