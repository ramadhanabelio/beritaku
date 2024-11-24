@extends('layouts.app')

@section('content')
    <form action="{{ url('posts/' . $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-sm-12 col-12 m-auto">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif (session('failed'))
                    <div class="alert alert-danger">{{ session('failed') }}</div>
                @endif

                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="card-title text-center mt-2">Edit Berita</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title"
                                value="{{ old('title', $post->title) }}" placeholder="Masukkan judul berita" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Body</label>
                            <textarea class="form-control" id="body" name="body" placeholder="Masukkan isi berita" required>{{ old('body', $post->body) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/150' }}"
                                class="img-thumbnail mb-3" alt="{{ $post->title }}" width="50%">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ url('posts') }}" class="btn btn-danger me-1">Cancel</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
