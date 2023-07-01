@extends('layouts.app')


@section('title', $task->title)
@section('content')
  <div class="flex flex-col">

    <div class="">
      <p class="mb-4 text-slate-700">{{ $task->description }}</p>
      <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
      <p class="öb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} • Updated
        {{ $task->updated_at->diffForHumans() }}</p>
      <p>
        @if ($task->completed)
          <span class="text-green-500 text-sm font-medium">Completed</span>
        @else
          <span class="text-red-500 text-sm font-medium">Incompleted</span>
        @endif
      </p>

    </div>

    <div class="mt-4 flex gap-x-2 items-center">
      <div>
        <a class="bg-yellow-500 rounded-md text-sm px-5 py-1 text-white" href="{{ route('tasks.edit', $task) }}">Edit</a>
      </div>
      <form action="{{ route('tasks.toggle-complete', $task) }}" method="post">
        @csrf
        @method('PUT')
        <button class="{{ $task->completed ? 'bg-gray-500' : 'bg-green-500' }} rounded-md text-sm px-5 py-1 text-white"
          type="submit">
          Mark as {{ $task->completed ? 'incompleted' : 'completed' }}
        </button>
      </form>
      <form id="taskDeleteForm" action="{{ route('tasks.destroy', $task) }}" method="post">
        @csrf
        @method('DELETE')
        <button class="bg-red-500 rounded-md text-sm px-5 py-1 text-white" type="submit">Delete</button>
      </form>
    </div>

  </div>
@endsection


@section('scripts')
  <script>
    const delForm = document.getElementById('taskDeleteForm');
    delForm.addEventListener('submit', function(e) {
      e.preventDefault();

      Swal.fire({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this task!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel!",
          reverseButtons: true
        })
        .then((result) => {
          if (result.isConfirmed) {
            // remove the event listener
            delForm.removeEventListener('submit', this);
            delForm.submit();
          }
        });
    });
  </script>
@endsection
