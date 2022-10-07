@if (session()->has('success'))
  <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
    class="fixed bottom-3 right-3 z-50 w-96 rounded bg-blue-500 py-2 px-4 text-sm text-white">
    <p>{{ session('success') }} </p>
  </div>
@endif
