<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['searcho', 'hatlycategory', 'author']))->orderBy('id')->simplePaginate(4)
        ]);
    }
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => ['required','image'], // Migration table needs to be updated !!!!!
            'slug' => ['required',Rule::unique('posts','slug')],
            'body' => 'required',
            'excerpt' => 'required',
            'category_id' => ['required',Rule::exists('categories','id')]
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnailz');
        Post::create($attributes);
        return redirect('/');
    }
}