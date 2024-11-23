@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12 text-right">
            <a href="{{ url('posts') }}" class="btn btn-danger">Back</a>
        </div>
    </div>

    <form action="{{ url('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-sm-12 col-12 m-auto">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ Session::get('success') }}
                    </div>
                @elseif(Session::has('failed'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ Session::get('failed') }}
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="card-title text-center mt-2">Laravel 10 CKEditor Integration</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Masukkan judul berita"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Body</label>
                            <textarea class="form-control" id="body" name="body" placeholder="Masukkan isi berita"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
