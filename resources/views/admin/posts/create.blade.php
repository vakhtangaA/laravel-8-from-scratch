<x-layout>
  <section class="lg:max-w-3xl py-8 mx-auto flex">
    <x-aside></x-aside>
    <div class="flex-grow">
      <h1 class="mb-4 font-bold text-lg">Publish New Post</h1>
      <form method="POST"
            action="{{ route('posts.store') }}"
            class="p-12 bg-gray-300 border-2 border-gray-400 border-opacity-40"
            enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
          <label for="title"
                 class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
          <input class="border border-gray-400 p-2 w-full"
                 type="text"
                 name="title"
                 id="title"
                 value="{{ old('title') }}"
                 required />
          @error('title')
            <p class="text-red-500 text-xs mt-2">
              {{ $message }}</p>
          @enderror
        </div>
        <div class="mb-6">
          <label for="slug"
                 class="block mb-2 uppercase font-bold text-xs text-gray-700">Slug</label>
          <input class="border border-gray-400 p-2 w-full"
                 type="text"
                 name="slug"
                 id="slug"
                 value="{{ old('slug') }}"
                 required />
          @error('slug')
            <p class="text-red-500 text-xs mt-2">
              {{ $message }}</p>
          @enderror
        </div>
        <div class="mb-6">
          <label for="thumbnail"
                 class="block mb-2 uppercase font-bold text-xs text-gray-700">Thumbnail</label>
          <input class="border border-gray-400 p-2 w-full"
                 type="file"
                 name="thumbnail"
                 id="thumbnail"
                 value="{{ old('slug') }}"
                 required />
          @error('thumbnail')
            <p class="text-red-500 text-xs mt-2">
              {{ $message }}</p>
          @enderror
        </div>
        <div class="mb-6">
          <label for="excerpt"
                 class="block mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>
          <textarea class="border border-gray-400 p-2 w-full"
                    name="excerpt"
                    id="excerpt"
                    required
                    rows="4">{{ old('excerpt') }}</textarea>
          @error('excerpt')
            <p class="text-red-500 text-xs mt-2">
              {{ $message }}</p>
          @enderror
        </div>
        <div class="mb-6">
          <label for="body"
                 class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
          <textarea class="border border-gray-400 p-2 w-full"
                    name="body"
                    id="body"
                    required
                    rows="7">{{ old('body') }}</textarea>
          @error('body')
            <p class="text-red-500 text-xs mt-2">
              {{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="category_id"
                 class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
          <select name="category_id"
                  id="category_id"
                  class="bg-blue-400 text-white">
            @foreach ($categories as $category)
              ;
              <option value="{{ $category->id }}">
                {{ ucwords($category->name) }}
              </option>
            @endforeach
          </select>
          @error('category')
            <p class="text-red-500 text-xs mt-2">
              {{ $message }}</p>
          @enderror
        </div>
        <button class="bg-blue-400 p-2 text-white"
                type="submit">
          Publish
        </button>
      </form>
    </div>
  </section>
</x-layout>
