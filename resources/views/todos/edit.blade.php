@extends('todos.layout')

@section('content')
    <div class="d-flex justify-content-center border-bottom pb-4 px-4">
        <h1 class="d-inline-flex justify-content-center pb-4">Update this Todo list</h1>
        <a href="{{ route('todo.index') }}" class="mx-4 py-1 text-primary text-decoration-none">
            <span class="fas fa-arrow-left fa-2x"></span>
        </a>
    </div>

    <x-alert/>
    <form action="{{ route('todo.update', $todo->id) }}" method="post" class="py-5">
        @csrf
        @method('patch')

        <div class="py-2">
            <input type="text" name="title" class="py-2 px-2 border" value="{{ $todo->title }}" placeholder="Title">
        </div>
        <div class="py-2">
            <textarea name="description" class="p-2 rounded border" placeholder="Description">
                {{ $todo->description }}
            </textarea>
        </div>
        <div class="py-2">
            @livewire('edit-step',['steps' => $todo->steps])
        </div>

        <div class="py-2">
        <input type="submit" value="update" class="p-2 border rounded bg-warning">
        </div>
    </form>
@endsection
