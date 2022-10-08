<form method="POST" action="{{ route('tasks.store') }}">
  @csrf
  <div class="mb-5">
    <x-input-label for="title" :value="__('Title')" />
    <input type="text" id="title"
      class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
      name="title" value="{{ old('title') }}" placeholder="Buy Grocerious" required autofocus>
    <x-input-error :messages="$errors->get('title')" class="mt-2" />
  </div>

  <div>
    <x-input-label for="description" :value="__('Description')" />
    <textarea name="description" placeholder="{{ __('Add description...') }}"
      class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
      rows="4">{{ old('description') }}</textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
  </div>
  <x-primary-button class="mt-4">{{ __('Add Task') }}</x-primary-button>
</form>
