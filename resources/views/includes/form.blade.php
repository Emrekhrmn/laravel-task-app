<div class="max-w-xl mx-auto">
  <form class="bg-gray-800 text-white shadow-lg shadow-black/30 rounded px-4 pt-6 pb-8" method="POST"
    action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}">
    @csrf {{-- cross site request forgery. a security feature --}}
    @isset($task)
      @method('PUT')
    @endisset

    <div class="mb-4">
      <label class="block text-sm font-bold mb-2" for="title">
        Title
      </label>
      <input id="title" name="title" value="{{ isset($task) ? $task->title : old('title') }}"
        class="shadow mb-1.5 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        type="text" placeholder="Title">
      @if ($errors->has('title'))
        <p class="text-red-500 text-xs italic">{{ $errors->first('title') }}</p>
      @endif
    </div>
    <div class="mb-4">
      <label class="block text-sm font-bold mb-2" for="description">
        Description
      </label>
      <textarea id="description" name="description" rows="2"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        placeholder="Description">{{ isset($task) ? $task->description : old('description') }}</textarea>
      @if ($errors->has('description'))
        <p class="text-red-500 text-xs italic">{{ $errors->first('description') }}</p>
      @endif
    </div>
    <div class="mb-4">
      <label class="block text-sm font-bold mb-2" for="long_description">
        Long Description
      </label>
      <textarea id="long_description" name="long_description" rows="5"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        placeholder="Long Description">{{ isset($task) ? $task->long_description : old('long_description') }}</textarea>
      @if ($errors->has('long_description'))
        <p class="text-red-500 text-xs italic">{{ $errors->first('long_description') }}</p>
      @endif
    </div>
    <div class="flex items-center justify-between">
      <button
        class="bg-white text-gray-800 duration-200 transition-all shadow-inner hover:shadow-gray-800/50 font-bold py-1.5 px-8 rounded focus:outline-none focus:shadow-outline"
        type="submit">
        @isset($task)
          Update Task
        @else
          Create Task
        @endisset
      </button>
    </div>
  </form>
</div>
