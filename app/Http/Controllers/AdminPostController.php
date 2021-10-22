<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function update(Post $post)
    {
        $atrributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if (isset($atrributes['thumbnail'])) {
            $atrributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($atrributes);

        return back()->with('success', 'Post Updated');
    }

    public function store()
    {
        $atrributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);


        $atrributes['user_id'] = auth()->id();
        $atrributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($atrributes);

        return redirect('/');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }
}
