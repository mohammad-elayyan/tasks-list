@extends('layouts.app')
@section('header')
    <h1 class="mt-3">List of the tasks</h1>
    <a class="btn mt-3" href="{{ route('tasks.create') }}">Add</a>
@endsection

@section('content')
    <table class="table table-light w-50 mx-auto">
        <thead>
            <tr>
                <td>#</td>
                <td>Task</td>
            </tr>
        </thead>
        <tbody>

            @forelse ($tasks as $i=>$task)
                <tr>
                    <td>{{ $tasks->firstItem() + $i }}</td>
                    <td>

                        <a @class([
                            'text-success' => $task->completed,
                            'text-decoration-none',
                        ]) href="{{ route('tasks.show', $task->id) }}">
                            {{ $task->title }}
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td>

                        <p>No Tasks Yet!</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $tasks->links() }}

    @if (session()->has('message'))
        <script>
            alert('{{ session('message') }}')
        </script>
    @endif
@endsection
