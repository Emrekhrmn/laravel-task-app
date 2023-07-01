@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
  <div>
    @forelse ($tasks as $task)
      <div class="flex font-semibold mb-2">
        <p @class(['py-0.5', 'line-through' => $task->completed])><a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a></p>
        <a class="ml-auto bg-yellow-400 rounded-md p-1 text-gray-800 h-fit hover:shadow-md duration-200"
          href="{{ route('tasks.edit', $task) }}">
          <svg class="h-full" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path
              d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
            <path fill-rule="evenodd"
              d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
          </svg>
        </a>
      </div>
    @empty
      <p class="text-center bg-amber-100 text-amber-900 py-2 rounded-md">No tasks found</p>
    @endforelse
  </div>

  {{-- custom pagination --}}
  <nav class="my-5">
    @if ($tasks->hasPages())
      <ul class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($tasks->onFirstPage())
          <li class="px-2 py-1 text-center rounded-md bg-gray-800/20 text-white cursor-not-allowed">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6" fill="currentColor"
                class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
              </svg>
            </span>
          </li>
        @else
          <li class="px-2 py-1 text-center rounded-md bg-gray-800 text-white hover:shadow-md hover:text-yellow-300 duration-200">
            <a href="{{ $tasks->previousPageUrl() }}" rel="prev">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6" fill="currentColor"
                class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
              </svg>
            </a>
          </li>
        @endif

        {{-- Next Page Link --}}
        @if ($tasks->hasMorePages())
          <li class="px-2 py-1 text-center rounded-md bg-gray-800 text-white hover:shadow-md hover:text-yellow-300 duration-200">
            <a href="{{ $tasks->nextPageUrl() }}" rel="next">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6" fill="currentColor"
                class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
              </svg>
            </a>
          </li>
        @else
          <li class="px-2 py-1 text-center rounded-md bg-gray-800/20 text-white cursor-not-allowed">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6" fill="currentColor"
                class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
              </svg>
            </span>
          </li>
        @endif
      </ul>
    @endif
  </nav>
@endsection
