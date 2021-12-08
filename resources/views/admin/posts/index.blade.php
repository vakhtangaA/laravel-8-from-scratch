<x-layout>
  <section class="max-w-4xl py-8 mx-auto flex">
    <x-aside></x-aside>
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div
             class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div
               class="
              shadow
              overflow-hidden
              border-b border-gray-200
              sm:rounded-lg
            ">
            <table class="min-w-full divide-y divide-gray-200">
              <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($posts as $post)
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="ml-4">
                          <div
                               class="text-sm font-medium text-gray-900">
                            <a href="/posts/{{ $post->slug }}"
                               class="underline">
                              {{ $post->title }}
                            </a>
                          </div>
                        </div>
                      </div>
                    </td>

                    <td
                        class="
                      px-6
                      py-4
                      whitespace-nowrap
                      text-right text-sm
                      font-medium
                    ">
                      <a href="{{ route('posts.edit', ['post' => $post->id]) }}"
                         class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                    <td
                        class="
                      px-6
                      py-4
                      whitespace-nowrap
                      text-right text-sm
                      font-medium
                    ">
                      <form method="POST"
                            action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                        @csrf
                        @method('DELETE')

                        <button class="text-red-400">Delete</button>
                      </form>
                    </td>
                  </tr>

                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>
