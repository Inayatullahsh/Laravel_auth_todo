<x-app-layout>
  <div class="mx-auto max-w-2xl p-4 sm:p-6 lg:p-8">
    <form method="POST" action="{{ route('tasks.store') }}">
      @csrf
      <div class="">
        <x-input-label for="title" :value="__('Title')" />
        <input type="text" id="title"
          class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
          name="title" value="{{ old('title') }}" placeholder="Buy Grocerious" required autofocus>
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
      </div>

      <div class="mt-4">
        <x-input-label for="description" :value="__('Description')" />
        <textarea name="description" placeholder="{{ __('Add description...') }}"
          class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
          rows="4">{{ old('description') }}</textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
      </div>
      <x-primary-button class="mt-4">{{ __('Add Task') }}</x-primary-button>
    </form>

    <div class="mt-12 divide-y rounded-lg bg-white shadow-sm">
      @foreach ($tasks as $task)
        <div class="flex items-center space-x-2 px-6 py-4">
          <input id="is_completed" type="checkbox"
            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            name="is_completed" {{ $task->is_completed ? 'checked' : '' }}>
          <div class="flex-1">
            <div class="flex items-center justify-between">
              <div>
                <a href="{{ route('tasks.edit', $task) }}" class="text-gray-800">{{ $task->title }}</a>
                @unless($task->created_at->eq($task->updated_at))
                  <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                @endunless
              </div>
              @if ($task->author->is(auth()->user()))
                <x-dropdown>
                  <x-slot name="trigger">
                    <button>
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                          d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                      </svg>
                    </button>
                  </x-slot>
                  <x-slot name="content">
                    <x-dropdown-link :href="route('tasks.edit', $task)">
                      {{ __('Edit') }}
                    </x-dropdown-link>
                    <form method="POST" action="">
                      @csrf
                      @method('delete')
                      <x-dropdown-link onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Delete') }}
                      </x-dropdown-link>
                    </form>
                  </x-slot>
                </x-dropdown>
              @endif
            </div>
            {{-- <p class="mt-4 text-lg text-gray-900">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam,
            molestias.</p> --}}
          </div>
        </div>
      @endforeach
    </div>
  </div>
</x-app-layout>
