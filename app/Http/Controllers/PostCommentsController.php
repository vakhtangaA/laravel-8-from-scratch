<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Post;

class PostCommentsController extends Controller
{
	public function store(Post $post, StoreCommentRequest $request)
	{
		$validated = $request->validated();

		$post->comments()->create([
			'user_id' => $request->user()->id,
			'body'    => $validated['body'],
		]);

		return back();
	}
}
