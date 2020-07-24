@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="/posts/create" class="btn btn-primary mb-3">Create Post</a>
                    <h3>Your Blog Posts</h3>
                    @if (count($posts)>0)
                    <table class="table table-striped table-fit">
                        <tr>
                            <th class="w-50">Title</th>
                            <th class="w-25"></th>
                            <th class="w-25"></th>
                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-dark">Edit</a></td>
                            <td>
                                {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'float-right'])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <p>No posts found</p>
                    @endIf
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
