@extends('layouts.app')

@section('content')
<h1>Posts Index</h1>
    @if (count($posts)>0)
        @foreach ($posts as $post)
        <div class="card p-4 mb-3">
            <div class="row no-gutters">
                <div class="col-md-3">
                    <img class="card-img-top" src="/storage/cover_images/{{$post->cover_image}}" alt="Card image cap">
                </div>
                <div class="col-md-9">
                    <div class="card-block px-2">
                        <h3 class="card-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a> </h3>
                        <small class="card-text">Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {{$posts->links()}}
    @else 
    <p>No posts found</p>
    @endif
@endsection