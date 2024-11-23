@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-8">
            <h3 class="text-right">Laravel 10 CKEditor Integration</h3>
        </div>
        <div class="col-xl-4 text-right">
            <a href="{{ url('create') }}" class="btn btn-primary">Add Post</a>
        </div>
    </div>
    @if (count($posts) > 0)
        <div class="table-responsive mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{!! \Illuminate\Support\Str::words(strip_tags($post->body), 10, '...') !!}</td>
                            <td>
                                <a href="{{ url('posts/' . $post->id) }}" class="badge text-bg-info text-decoration-none"><i
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
        {{ $posts->links() }}
    @endif
@endsection
