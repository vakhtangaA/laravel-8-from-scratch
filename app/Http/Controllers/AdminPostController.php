<?php

namespace App\Http\Controllers;

# TODO: remove unused imports

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
        # TODO
        # If you are returning only views, 
        # You can do this from the routes file like this:
        # Route::view('route', 'view');
        # @see https://laravel.com/docs/8.x/routing#view-routes
        return view('admin.posts.create');
    }

    public function update(Post $post)
    {
        # TODO 
        # validation logic should be extracted
        # Into custom request
        # @see https://laravel.com/docs/8.x/validation#form-request-validation
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
        # TODO 
        # validation logic should be extracted
        # Into custom request
        # @see https://laravel.com/docs/8.x/validation#form-request-validation
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
