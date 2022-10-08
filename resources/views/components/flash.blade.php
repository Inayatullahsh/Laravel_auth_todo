@if (session()->has('success') or session()->has('delete'))
  <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
    class="{{ session()->has('delete') ? 'bg-red-500' : 'bg-blue-500' }} fixed bottom-3 right-3 z-50 w-96 rounded py-2 px-4 text-sm text-white">
    <p>{{ session('delete') ?? session('success') }} </p>
  </div>
@endif
