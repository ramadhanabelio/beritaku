@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow">
                    <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/750x400' }}"
                        class="card-img-top-thumb" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $post->title }}</h5>
                        <p class="card-text">
                            {{ \Illuminate\Support\Str::words(strip_tags($post->body), 25, '...') }}
                        </p>
                        <a href="{{ url('posts/' . $post->id) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
