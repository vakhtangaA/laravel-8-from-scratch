<x-layout>
  <section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10">
      <h1 class="text-center font-bold text-xl">Log In</h1>
      <form action="{{ route('sessions') }}"
            method="POST"
            class="mt-10">
        @csrf

        <div class="mb-6">
          <label for="email"
                 class="block mb-2 uppercase font-bold text-xs text-gray-700">email</label>
          <input class="border border-gray-400 p-2 w-full"
                 type="email"
                 name="email"
                 id="email"
                 value="{{ old('email') }}"
                 required />
        </div>

        <div class="mb-6">
          <label for="password"
                 class="block mb-2 uppercase font-bold text-xs text-gray-700">password</label>
          <input type="password"
                 name="password"
                 id="password"
                 class="border border-gray-400 p-2 w-full"
                 required />
        </div>
        <div class="mb-6">
          <button type="submit"
                  class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
            Submit
          </button>
        </div>

        @if ($errors->any())
          <ul>
            @foreach ($errors->all() as $error)
              <li class="text-red-500 text-xs">{{ $error }}
              </li>
            @endforeach
          </ul>
        @endif
      </form>
    </main>
  </section>
</x-layout>
