<?php

use App\Http\Controllers\TaskController;
use App\Models\Task as TaskItem;
use Illuminate\Support\Facades\Route;

// class Task
// {
//     public function __construct(
//         public int $id,
//         private string $title,
//         public string $description,
//         public ?string $long_description,
//         public bool $completed,
//         public string $created_at,
//         public string $updated_at
//     ) {
//     }

//     public function getTitle()
//     {
//         return $this->title;
//     }
// }

// $tasks = [
//     new Task(
//         1,
//         'Buy groceries',
//         'Task 1 description',
//         'Task 1 long description',
//         false,
//         '2023-03-01 12:00:00',
//         '2023-03-01 12:00:00'
//     ),
//     new Task(
//         2,
//         'Sell old stuff',
//         'Task 2 description',
//         null,
//         false,
//         '2023-03-02 12:00:00',
//         '2023-03-02 12:00:00'
//     ),
//     new Task(
//         3,
//         'Learn programming',
//         'Task 3 description',
//         'Task 3 long description',
//         true,
//         '2023-03-03 12:00:00',
//         '2023-03-03 12:00:00'
//     ),
//     new Task(
//         4,
//         'Take dogs for a walk',
//         'Task 4 description',
//         null,
//         false,
//         '2023-03-04 12:00:00',
//         '2023-03-04 12:00:00'
//     ),
// ];

Route::get('/', function () {
    return redirect()->route('tasks');
});

Route::resource('tasks', TaskController::class)->name('index', 'tasks');

Route::put('/toggle-task/{task}', [TaskController::class, 'toggleTask'])->name('toggle-task');
