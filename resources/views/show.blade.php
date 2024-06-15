@extends('layouts.app')

@section('content')
    <table class="table {{ $task->completed ? 'table-success' : 'table-info' }} w-50 mx-auto mt-5">

        <tbody>
            <tr>
                <td>Title</td>
                <td colspan="2">
                    <h6>{{ $task->title }}</h2>
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td colspan="2">
                    <h6>{{ $task->description }}</h2>
                </td>
            </tr>
            @if ($task->long_description)
                <tr>
                    <td>More Details</td>
                    <td colspan="2">
                        <h6>{{ $task->long_description }}</h2>
                    </td>
                </tr>
            @endif
            <tr>
                <td>Status</td>
                <td colspan="2">
                    <h6>{{ $task->completed ? 'completed' : 'in progress' }}</h2>
                </td>
            </tr>
            <tr>
                <td>Last Update</td>
                <td colspan="2">
                    <h6>{{ $task->updated_at }}</h2>
                </td>
            </tr>
            <tr>
                <td>Create Time</td>
                <td colspan="2">
                    <h6>{{ $task->created_at }}</h2>
                </td>
            </tr>
            <tr>
                <td>
                    <form class="mx-auto" action="{{ route('toggle-task', $task) }}" method="POST">
                        @csrf
                        @method('put')

                        <input class="btn px-5" type="submit" value="{{ $task->completed ? 'Uncomplete' : 'Complete' }}">

                    </form>
                </td>
                <td>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <input class="btn" type="submit" value="Delete">
                    </form>
                <td>

                    <a href="{{ route('tasks.edit', $task) }}" class="btn">Edit</a>
                </td>
                </td>
            </tr>
        </tbody>

    </table>
@endsection

@section('footer')
@endsection
