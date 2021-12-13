<x-dropdown>
  <x-slot name="trigger">
    <button
            class="
        py-2
        pl-3
        pr-9
        text-sm
        font-semibold
        w-full
        lg:w-32
        text-left
        flex
        inline-flex
      ">
      {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

      <x-icons.category-dropdown-icon />
    </button>
  </x-slot>

  <x-dropdown-item href="{{ route('home') }}"
                   :active="$_SERVER['REQUEST_URI'] === '/'">All
  </x-dropdown-item>

  @foreach ($categories as $category)

    <x-dropdown-item href="{{ route('home', ['category' => $category->slug]) }}"
                     :active="isset($currentCategory) && $currentCategory->name === $category->name">
      {{ ucwords($category->name) }}</x-dropdown-item>

  @endforeach
</x-dropdown>
