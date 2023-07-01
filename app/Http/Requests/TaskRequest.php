<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
   */
  public function rules(): array
  {
    $_method = $this->method();
    if ($_method == 'POST') {  // CREATE
      return [
        'title' => 'required|max:150|min:4|unique:tasks',
        'description' => 'required|min:10',
        'long_description' => 'required|min:10',
      ];
    } else if ($_method == 'PUT') {  // UPDATE
      return [
        'title' => 'required|max:150|min:4|unique:tasks,title,' . $this->task->id . ',id',
        'description' => 'required|min:10',
        'long_description' => 'required|min:10',
      ];
    } else {  // DEFAULT
      return [];
    }
  }
}
