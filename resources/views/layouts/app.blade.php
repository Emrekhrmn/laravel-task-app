<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel 10 Task App</title>
  @vite('resources/css/app.css')
  @yield('styles') {{-- for any additional styles --}}
</head>

<body class="bg-yellow-100">

  {{-- Begin Logo --}}
  <div class="flex justify-center py-4">
    <a href="/">
      <img src="https://avatars.githubusercontent.com/u/59236526?v=4" class="h-20" alt="Flowbite Logo" />
    </a>
  </div>
  {{-- End Logo --}}

  {{-- Begin Nav --}}
  <nav class="bg-gray-800 py-4 font-bold uppercase sticky top-0 z-10 shadow-lg shadow-black/30">
    <ul class="flex justify-center gap-x-5">
      <li><a href="{{ route('tasks.index') }}" class="text-white hover:text-yellow-300 duration-200">Home</a></li>
      <li><a href="{{ route('tasks.create') }}" class="text-white hover:text-yellow-300 duration-200">Create</a></li>
    </ul>
  </nav>
  {{-- End Nav --}}

  {{-- Begin Content --}}
  <div class="mx-auto container max-w-xl mt-10 px-4 sm:px-0">
    <h1 class="text-3xl font-bold capitalize mb-2.5">@yield('title')</h1>
    @yield('content')
  </div>
  {{-- End Content --}}

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if (session()->has('success'))
    <script>
      Swal.fire({
        title: 'Success!',
        text: '{{ session()->get('success') }}',
        icon: 'success',
        confirmButtonText: 'Ok'
      })
    </script>
  @endif
  @yield('scripts') {{-- for any additional scripts --}}
</body>

</html>
