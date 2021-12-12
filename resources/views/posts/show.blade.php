<x-layout>

  <section class="px-6 py-8">

    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
      <article
               class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
        <div class="col-span-4 lg:text-center lg:pt-14 mb-10">

          <img src="{{ $post->thumbnail === null ? asset('images/illustration-3.png') : asset('storage/' . $post->thumbnail) }}"
               alt="thumbnail"
               class="rounded-xl">

          <p class="mt-4 block text-gray-400 text-xs">
            Published
            <time>{{ $post->created_at->diffForHumans() }}</time>
          </p>

          <div
               class="flex items-center lg:justify-center text-sm mt-4">
            <img src=" {{ asset('images/lary-avatar.svg') }}"
                 alt="Lary avatar">
            <div class="ml-3 text-left">
              <h5 class="font-bold">
                <a href="/?author={{ $post->author->username }}">
                  {{ $post->author->name }}
                </a>
              </h5>
            </div>
          </div>
        </div>

        <div class="col-span-8">
          <div class="hidden lg:flex justify-between mb-6">
            <a href="/"
               class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
              <x-icons.back-icon />

              Back to Posts
            </a>

            <div class="space-x-2">
              <x-category-button :category="$post->category" />
              <a href="#"
                 class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"
                 style="font-size: 10px">Updates</a>
            </div>
          </div>

          <h1 class="font-bold text-3xl lg:text-4xl mb-10">
            {{ $post->title }}
          </h1>

          <div class="space-y-4 lg:text-lg leading-loose break-all">
            {{ $post->body }}
          </div>
        </div>
        <section class="col-span-8 col-start-5 mt-10 space-y-6">
          @auth

            <form method="POST"
                  action="{{ route('comments', ['post' => $post->slug]) }}"
                  class="border border-gray-200 p-6 rounded-xl">
              @csrf
              <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ $post->user_id }}"
                     alt="avatar"
                     width="40px"
                     height="40px"
                     class="rounded-full mr-5" />
                <h2>
                  Want to paricipate?
                </h2>
              </header>

              <div class="mt-6">
                <textarea name="body"
                          class="w-full text-sm focus:outline-none focus:ring p-2"
                          cols="30"
                          placeholder="comment here"
                          rows="6"
                          required></textarea>

                @error('body')
                  <span
                        class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

                <div>
                  <button type="submit"
                          class="bg-blue-400 p-1  text-white mt-3">Post</button>
                </div>

              </div>

            </form>

          @else
            <p class="font-semibold">
              <a href="/login"
                 class="hover:underline">Log in to leave a
                comment.</a>
            </p>
          @endauth

          @foreach ($post->comments as $comment)
            <x-post-comment :comment="$comment" />
          @endforeach
        </section>
      </article>
    </main>


  </section>

</x-layout>
