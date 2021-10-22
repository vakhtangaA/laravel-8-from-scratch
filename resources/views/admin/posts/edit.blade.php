<x-layout>
  <section class="lg:max-w-3xl py-8 mx-auto flex">
    <x-aside></x-aside>
    <div class="flex-grow">
      <h1 class="mb-4 font-bold text-lg">Edit Post</h1>
      <form
        method="POST"
        action="/admin/posts/{{ $post->id }}"
        class="p-12 bg-gray-300 border-2 border-gray-400 border-opacity-40"
        enctype="multipart/form-data"
      >
        @csrf @method('PATCH')
        <div class="mb-6">
          <label
            for="title"
            class="block mb-2 uppercase font-bold text-xs text-gray-700"
            >Title</label
          >
          <input
            class="border border-gray-400 p-2 w-full"
            type="text"
            name="title"
            id="title"
            value="{{ $post->title }}"
            required
          />
          @error('title')
          <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-6">
          <label
            for="slug"
            class="block mb-2 uppercase font-bold text-xs text-gray-700"
            >Slug</label
          >
          <input
            class="border border-gray-400 p-2 w-full"
            type="text"
            name="slug"
            id="slug"
            value="{{ $post->slug }}"
            required
          />
          @error('slug')
          <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-6">
          <label
            for="thumbnail"
            class="block mb-2 uppercase font-bold text-xs text-gray-700"
            >Thumbnail</label
          >
          <input
            class="border border-gray-400 p-2 w-full"
            type="file"
            name="thumbnail"
            id="thumbnail"
          />
          <img
            src="{{ asset('storage/' . $post->thumbnail) }}"
            alt=""
            class="rounded-xl pt-5"
            width="100"
          />
          @error('thumbnail')
          <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-6">
          <label
            for="excerpt"
            class="block mb-2 uppercase font-bold text-xs text-gray-700"
            >Excerpt</label
          >
          <textarea
            class="border border-gray-400 p-2 w-full"
            name="excerpt"
            id="excerpt"
            required
            rows="4"
            >{{ $post->excerpt }}</textarea
          >
          @error('excerpt')
          <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-6">
          <label
            for="body"
            class="block mb-2 uppercase font-bold text-xs text-gray-700"
            >Body</label
          >
          <textarea
            class="border border-gray-400 p-2 w-full"
            name="body"
            id="body"
            required
            rows="10"
            >{{ $post->body }}</textarea
          >
          @error('body')
          <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label
            for="category_id"
            class="block mb-2 uppercase font-bold text-xs text-gray-700"
            >Category</label
          >
          <select
            name="category_id"
            id="category_id"
            class="bg-blue-400 text-white"
          >
            @foreach(\App\Models\Category::all() as $category);
            <option value="{{ $category->id }}">
              {{ ucwords($category->name) }}
            </option>
            @endforeach
          </select>
          @error('category')
          <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>
        <button class="bg-blue-400 p-2 text-white" type="submit">Update</button>
      </form>
    </div>
  </section>
</x-layout>
