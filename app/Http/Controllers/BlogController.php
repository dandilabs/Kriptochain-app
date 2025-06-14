<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        // Featured post: post dengan views terbanyak
        $featuredPost = Post::with(['category', 'tags'])
            ->orderByDesc('views')
            ->first();

        // Ambil post yang published, beserta kategori & tag
        $posts = Post::with(['category', 'tags'])
        ->where('id', '!=', optional($featuredPost)->id)
        ->latest()
        ->paginate(4);

        // Filter search jika ada query
        if ($query) {
            $posts->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                ->orWhere('content', 'like', "%{$query}%")
                ->orWhere('body', 'like', "%{$query}%"); // jika ada kolom body
            });
        }

        // Optionally, ambil kategori populer, post populer, dll
        $categories = \App\Models\Category::withCount('posts')->orderByDesc('posts_count')->get();
        $popularPosts = Post::orderByDesc('views')->take(4)->get(); // jika ada views
        // $popularPosts = Post::latest()->take(4)->get();

        return view('blog.index', compact('posts', 'categories', 'popularPosts','featuredPost','query'));
    }

    public function show($slug)
    {
        $post = Post::with(['category', 'tags'])->where('slug', $slug)->firstOrFail();
         // Tambahkan views
        $post->increment('views');
        $categories = \App\Models\Category::withCount('posts')->orderByDesc('posts_count')->get();
        $popularPosts = Post::orderByDesc('views')->take(4)->get();
        // Bisa tambahkan logic increment views, ambil post terkait, dsb
        // Artikel terkait (misal kategori sama, exclude current)
        $relatedPosts = \App\Models\Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts','popularPosts','categories'));
    }

    public function category($slug)
    {
        $category = \App\Models\Category::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()
            ->with(['category', 'tags'])
            ->latest()
            ->paginate(4);

        $categories = \App\Models\Category::withCount('posts')->orderByDesc('posts_count')->get();
        $popularPosts = Post::orderByDesc('views')->take(4)->get();

        return view('blog.index', [
            'posts' => $posts,
            'categories' => $categories,
            'popularPosts' => $popularPosts,
            'currentCategory' => $category
        ]);
    }

    public function tag($slug)
    {
        $tag = \App\Models\Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->with(['category', 'tags'])->latest()->paginate(4);
        $categories = \App\Models\Category::withCount('posts')->orderByDesc('posts_count')->get();
        $popularPosts = Post::orderByDesc('views')->take(4)->get();

        return view('blog.index', [
            'posts' => $posts,
            'categories' => $categories,
            'popularPosts' => $popularPosts,
            'currentTag' => $tag
        ]);
    }
}
