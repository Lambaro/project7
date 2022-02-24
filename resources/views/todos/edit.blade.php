@extends('todos.layout')

@section('content')
    <h1 class="d-inline-flex justify-content-center border-bottom pb-4">Update this Todo list</h1>


    <x-alert/>
    <form action="{{ route('todo.update', $todo->id) }}" method="post" class="py-5">
        @method('patch')
        @csrf

        <input type="text" name="title" value="{{ $todo->title }}" class="py-2 px-2 border">
        <input type="submit" value="update" class="p-2 border rounded">
    </form>

    <a href="{{ route('todo.index') }}" class=" p-2 border m-5 pointer-event bg-white text-black text-decoration-none">Back</a>
@endsection
