<!DOCTYPE html>

<head>

  <title>Laravel From Scratch Blog</title>
  <link rel="preconnect"
        href="https://fonts.gstatic.com" />
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap"
        rel="stylesheet" />
  <link href="{{ asset('css/app.css') }}"
        rel="stylesheet">
  <script src="{{ mix('js/app.js') }}"
          defer></script>
</head>

<body style="font-family: Open Sans, sans-serif">
  {{-- this script tag stops firefox
    to flash unstyled content and forces it wait until styles are loaded.
    see this stackoverflow link for reference
    https://stackoverflow.com/questions/21147149/flash-of-unstyled-content-fouc-in-firefox-only-is-ff-slow-renderer --}}
  <script>
    0
  </script>
  <section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
      <div>
        <a href="{{ route('home') }}">
          <img src="{{ asset('images/logo.svg') }}"
               alt="Laracasts Logo"
               width="165"
               height="16" />
        </a>
      </div>

      <div class="mt-8 md:mt-0 flex items-center">
        @auth
          <x-dropdown>
            <x-slot name="trigger">
              <button class="text-xs font-bold uppercase">
                Welcome, {{ auth()->user()->name }}
              </button>
            </x-slot>
            @if (auth()->user()->can('admin'))
              <x-dropdown-item href="{{ route('posts.create') }}">
                New Post</x-dropdown-item>
              <x-dropdown-item href="{{ route('posts.index') }}">
                Dashboard</x-dropdown-item>
            @endif

            <x-dropdown-item href="#"
                             x-data="{}"
                             @click.prevent="document.querySelector('#logout-form').submit()">
              Logout</x-dropdown-item>
            <form method="POST"
                  action="{{ route('logout') }}"
                  id="logout-form"
                  class="hidden">
              @csrf
            </form>
          </x-dropdown>
        @else
          <a href="{{ route('registerForm') }}"
             class="text-xs font-bold uppercase">Register</a>
          <a href="{{ route('login') }}"
             class="ml-6 text-xs font-bold uppercase">Log In</a>

        @endguest

        <a href="#newsletter"
           class="
            bg-blue-500
            ml-3
            rounded-full
            text-xs
            font-semibold
            text-white
            uppercase
            py-3
            px-5
          ">
          Subscribe for Updates
        </a>
      </div>
    </nav>

    {{ $slot }}

    <footer id="newsletter"
            class="
        bg-gray-100
        border border-black border-opacity-5
        rounded-xl
        text-center
        py-16
        px-10
        mt-16
      ">
      <img src="{{ asset('images/lary-newsletter-icon.svg') }}"
           alt=""
           class="mx-auto -mb-6"
           style="width: 145px" />
      <h5 class="text-3xl">Stay in touch with the latest
        posts</h5>
      <p class="text-sm mt-3">Promise to keep the inbox clean.
        No bugs.</p>

      <div class="mt-10">
        <div
             class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
          <form method="POST"
                action="{{ route('newsletter') }}"
                class="lg:flex text-sm">
            @csrf
            <div class="lg:py-3 lg:px-5 flex items-center">
              <label for="email"
                     class="hidden lg:inline-block">
                <img src=" {{ asset('images/mailbox-icon.svg') }}"
                     alt="mailbox letter" />
              </label>

              <div>
                <input name="email"
                       id="email"
                       type="text"
                       placeholder="Your email address"
                       class="
                    block
                    lg:bg-transparent
                    py-2
                    lg:py-0
                    pl-4
                    focus-within:outline-none
                  " />

                @error('email')
                  <span
                        class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <button type="submit"
                    class="
                transition-colors
                duration-300
                bg-blue-500
                hover:bg-blue-600
                mt-4
                lg:mt-0 lg:ml-3
                rounded-full
                text-xs
                font-semibold
                text-white
                uppercase
                py-3
                px-8
              ">
              Subscribe
            </button>
          </form>
        </div>
      </div>
    </footer>
  </section>
  @if (session()->has('success'))
    <div x-data="{show: true}"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="
      fixed
      bg-blue-500
      text-white
      py-2
      px-4
      rounded-xl
      bottom-3
      right-3
      text-sm
    ">
      <p>{{ session()->get('success') }}</p>
    </div>
  @endif
</body>
