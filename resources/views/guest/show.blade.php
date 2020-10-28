@extends('layouts.app')

@section('content')
{{-- <div class="container ">
    <div class="card-group ">
        <div class="row">
                <div class="col-sm-4 pt-3">
                    <div class="card">
                        <img src="{{$post->img}}" class="card-img-top" alt="{{$post->title}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{$post->body}}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated {{$post->user->name}}</small>
                            <small class="text-muted">Last updated {{$post->updated_at}}</small>
                            <a href="{{route('guest.posts.show', $post->slug)}}"></a>
                        </div>
                    </div>
                </div>
        </div>

    </div>
    
</div> --}}
<img src="{{$post->img}}" class="card-img-top" alt="{{$post->title}}">
<h1>{{$post->title}}</h1>
<p>{{$post->body}}</p>

@endsection