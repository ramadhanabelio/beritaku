<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view("posts.index", compact("posts"));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'body.required' => 'Isi berita wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Tipe gambar harus berupa jpeg, png, jpg, atau gif.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('news', 'public');
            }

            Post::create([
                'title' => $request->title,
                'body' => $request->body,
                'image' => $imagePath,
            ]);

            return redirect()->back()->with('success', 'Berita berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Gagal menambahkan berita.');
        }
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'body.required' => 'Isi berita wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Tipe gambar harus berupa jpeg, png, jpg, atau gif.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        try {
            $post = Post::findOrFail($id);

            if ($request->hasFile('image')) {
                if ($post->image) {
                    Storage::disk('public')->delete($post->image);
                }
                $post->image = $request->file('image')->store('news', 'public');
            }

            $post->update([
                'title' => $request->title,
                'body' => $request->body,
                'image' => $post->image,
            ]);

            return redirect('posts')->with('success', 'Berita berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Gagal memperbarui berita.');
        }
    }

    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);

            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $post->delete();

            return redirect()->back()->with('success', 'Berita berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Gagal menghapus berita.');
        }
    }
}
