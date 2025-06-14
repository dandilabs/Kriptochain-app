<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['category', 'tags'])
            ->latest()
            ->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|unique:posts,title',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array|nullable',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $imagePath,
        ]);

        $post->tags()->sync($request->tags);

        return redirect()->route('admin.post.index')->with('success', 'Post berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post->load('tags');
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|unique:posts,title,' . $post->id,
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array|nullable',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'category_id' => $request->category_id,
        ];

        if ($request->hasFile('image')) {
            // Hapus file lama jika ada
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);
        $post->tags()->sync($request->tags);

        return redirect()->route('admin.post.index')->with('success', 'Post berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index')->with('success', 'Post berhasil dihapus!');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.post.hapus', compact('posts'));
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->back()->with('success', 'Post berhasil direstore');
    }

    public function delete($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();
        return redirect()->route('admin.post.trashed')->with('success', 'Post dihapus permanen!');
    }
}
