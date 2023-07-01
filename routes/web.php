<?php

use App\Http\Requests\TaskRequest;
use \App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
  $data = [
    'tasks' => Task::latest()->paginate(12),
  ];
  return view('index', $data);
})->name('tasks.index');

Route::get('/tasks/create', function () {
  return view('create');
})->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
  $data = [
    'task' => $task,
  ];
  return view('edit', $data);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
  $data = [
    'task' => $task,
  ];
  return view('show', $data);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {
  $task = Task::create($request->validated());
  return redirect()->route('tasks.show', $task)->with('success', 'Task created successfully.');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
  $task->update($request->validated());
  return redirect()->route('tasks.show', $task)->with('success', 'Task updated successfully.');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
  $task->delete();
  return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
})->name('tasks.destroy');

Route::put('/tasks/{task}/toggle-complete', function (Task $task) {
  $task->toggleComplete();
  return redirect()->back()->with('success', 'Task updated successfully.');
})->name('tasks.toggle-complete');