@extends('layouts.app')
@section('content')
<table class="table table-dark">
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
              <button type="submit" class="btn btn-primary">Delete</button>
          </form>
      </td>
      <td><a href="{{route('posts.edit', $post->id)}}">Edit</a></td>
    </tr>
      
  @endforeach
  </tbody>
</table>
@endsection