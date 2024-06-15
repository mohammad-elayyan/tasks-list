@extends('layouts.app')
@section('content')
    @if ($editingTask ?? '')
        @section('title', 'Update Task')
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <label for="title">Title</label>
            <input class="form-control" id="title" type="text" name="title" value="{{ $task->title }}"><br><br>
            @error('title')
                <span style="color: red">{{ $message }}</span><br><br>
            @enderror
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea><br><br>
            @error('description')
                <span style="color: red">{{ $message }}</span><br><br>
            @enderror
            <label for="long_description">More Description</label>
            <textarea class="form-control" id="long_description" name="long_description">{{ $task->long_description }}</textarea><br><br>
            @error('long_description')
                <span style="color: red">{{ $message }}</span><br><br>
            @enderror
            <label for="completed">Completed</label>
            <input class="form-check-input" id="completed" type="checkbox" name="completed"
                {{ $task->completed ? 'checked' : '' }}><br><br>
            <a class="btn" href="{{ route('tasks.show', $task->id) }}">Cancel</a>
            <input class="btn" type="submit" value="Update">
        </form>
    @else
    @section('title', 'Add Task')
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="title">Title</label>
        <input class="form-control" id="title" type="text" name="title" value="{{ old('title') }}"><br><br>
        @error('title')
            <span style="color: red">{{ $message }}</span><br><br>
        @enderror
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea><br><br>
        @error('description')
            <span style="color: red">{{ $message }}</span><br><br>
        @enderror
        <label for="long_description">More Description</label>
        <textarea class="form-control" id="long_description" name="long_description">{{ old('long_description') }}</textarea><br><br>
        @error('long_description')
            <span style="color: red">{{ $message }}</span><br><br>
        @enderror
        <label for="completed">Completed</label>
        <input class="form-check-input" id="completed" type="checkbox" name="completed"><br><br>
        <a class="btn" href="{{ route('tasks') }}">Cancel</a>
        <input class="btn" type="submit" value="Add">
    </form>
@endif
@endsection
