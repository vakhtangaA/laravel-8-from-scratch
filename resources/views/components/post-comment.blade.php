<article
  class="flex border border-gray-200 bg-gray-100 p-6 rounded-xl space-x-4"
>
  <div class="flex-shrink-0">
    <img
      src="https://i.pravatar.cc/60?u={{ $comment->user_id }}"
      alt="avatar"
      width="60px"
      height="60px"
      class="rounded-xl"
    />
  </div>
  <div>
    <header class="mb-4">
      <h3 class="font-bold">{{ $comment->author->username }}</h3>
      <p class="text-xs">
        Posted <time>{{ $comment->created_at->format('Y d') }}</time>
      </p>
    </header>
    <p>
      {{ $comment->body }}
    </p>
  </div>
</article>
