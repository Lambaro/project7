@extends('todos.layout')

@section('content')
    <div class="d-flex justify-content-center border-bottom pb-4 px-4">
        <h1 class="text-2x1 pb-4">What next you need To-Do</h1>
        <a href="{{ route('todo.index') }}" class="mx-4 py-1 text-primary text-decoration-none">
            <span class="fas fa-arrow-left fa-2x"></span>
        </a>
    </div>

    <x-alert/>
    <form action="{{ route('todo.store') }}" method="post" class="py-5">
        @csrf

        <div>
            <input type="text" name="title" class="py-2 px-2 border" placeholder="Title">
        </div>

        <div class="py-2">
            <textarea name="description" class="p-2 rounded border" placeholder="Write your task here"></textarea>
        </div>

        <div class="py-2">
            @livewire('step')
        </div>

        <div class="py-2">
            <input type="submit" value="create" class="p-2 border rounded bg-warning">
        </div>
    </form>
@endsection



