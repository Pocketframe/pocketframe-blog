@props(['id', 'title' => null, 'size' => 'max-w-lg', 'footer' => null])

<div
  id="{{ $id }}"
  class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50"
  tabindex="-1">
  <div class="relative w-full {{ $size }} p-4">
    <div class="bg-white rounded-lg shadow">

      <button
        type="button"
        class="absolute top-3 right-3 text-gray-400 hover:text-gray-900"
        data-modal-close="{{ $id }}">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0
               111.414 1.414L11.414 10l4.293 4.293a1 1 0
               01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0
               01-1.414-1.414L8.586 10 4.293 5.707a1 1 0
               010-1.414z"
            clip-rule="evenodd" />
        </svg>
      </button>

      @if($title)
      <div class="px-6 pt-6 pb-4 border-b">
        <h3 class="text-xl font-semibold">{{ $title }}</h3>
      </div>
      @endif

      <div class="px-6 py-4">
        {{ $slot }}
      </div>

      @if($footer)
      <div class="px-6 py-4 border-t text-right">
        {!! $footer !!}
      </div>
      @endif

    </div>
  </div>
</div>
