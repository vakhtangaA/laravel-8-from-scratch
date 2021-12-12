<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class AdminPostController extends Controller
{
	public function index()
	{
		return view('admin.posts.index', [
			'posts' => Post::paginate(50),
		]);
	}

	public function edit(Post $post)
	{
		$categories = Category::all();

		return view('admin.posts.edit', ['post' => $post, 'categories' => $categories]);
	}

	public function create()
	{
		# this view is used with resources
		$categories = Category::all();
		return view('admin.posts.create', ['categories' => $categories]);
	}

	public function update(Post $post, UpdatePostRequest $request)
	{
		$attributes = $request->validated();

		if (isset($request['thumbnail']))
		{
			$post['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		}

		$post->update($attributes);

		return back()->with('success', 'Post Updated');
	}

	public function store(StorePostRequest $request)
	{
		$attributes = $request->validated();
		$attributes['user_id'] = auth()->id();

		$imagePath = $request->file('thumbnail')->store('thumbnails');

		$attributes['thumbnail'] = $imagePath;

		Post::create($attributes);

		return redirect()->route('home');
	}

	public function destroy(Post $post)
	{
		$post->delete();

		return back()->with('success', 'Post Deleted!');
	}
}
