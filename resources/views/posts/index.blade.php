@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Berita</h3>
        <a href="{{ url('create') }}" class="btn btn-success">+ Add Post</a>
    </div>
    <div class="table-responsive mt-4">
        <table id="dataTable" class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->index + 1 }}.</td>
                        <td>{{ $post->title }}</td>
                        <td>{!! \Illuminate\Support\Str::words(strip_tags($post->body), 10, '...') !!}</td>
                        <td>
                            <a href="{{ url('posts/' . $post->slug) }}" class="badge text-bg-info text-decoration-none"><i
                                    class="bi bi-eye-fill"></i> Show</a>
                            <a href="{{ url('posts/' . $post->id . '/edit') }}"
                                class="badge text-bg-warning text-decoration-none"><i class="bi bi-pencil-fill"></i>
                                Edit</a>
                            <form action="{{ url('posts/' . $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge text-bg-danger border-0"><i
                                        class="bi bi-trash-fill"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
