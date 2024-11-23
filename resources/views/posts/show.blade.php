@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/750x400' }}"
                class="card-img-top" alt="{{ $post->title }}" width="750px" height="cover">
            <div class="card-body">
                <h1 class="card-title mt-3">{{ $post->title }}</h1>
                <p class="card-text">{!! $post->body !!}</p>
                <a href="{{ url('posts') }}" class="btn btn-secondary">Back to Posts</a>
            </div>
        </div>
    </div>
@endsection
