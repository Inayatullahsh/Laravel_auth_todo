<x-app-layout>
  <div class="mx-auto max-w-2xl p-4 sm:p-6 lg:p-8">
    <form method="POST" action="{{ route('tasks.update', $task) }}">
      @csrf
      @method('patch')
      <div>
        <x-input-label for="title" :value="__('Title')" />
        <input type="text" id="title"
          class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
          name="title" value="{{ old('title', $task->title) }}" placeholder="Buy Grocerious" required autofocus>
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
      </div>

      <div class="mt-4">
        <x-input-label for="description" :value="__('Description')" />
        <textarea name="description" placeholder="{{ __('Add description...') }}"
          class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
          rows="4">{{ old('description', $task->description) }}</textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
      </div>

      <div class="mt-4">
        <label for="is_completed" class="inline-flex items-center">
          <input type="checkbox"
            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            name="is_completed" id="is_completed" {{ $task->is_completed ? 'checked' : '' }}>

          <span class="ml-2 text-sm capitalize text-gray-600">{{ __('Is Task completed?') }}</span>
        </label>
      </div>

      <div class="mt-4 space-x-2">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
        <a href="{{ route('tasks.index') }}">{{ __('Cancel') }}</a>
      </div>
    </form>

  </div>
</x-app-layout>
