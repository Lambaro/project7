@extends('todos.layout')

@section('content')

    <h1 class="text-2x1 border-bottom pb-4">What next you need To-Do</h1>
    <x-alert/>
    <form action="/todos/create" method="post" class="py-5">
        @csrf

        <input type="text" name="title" class="py-2 px-2 border">
        <input type="submit" value="create" class="p-2 border rounded">
    </form>

    <a href="/todos/" class=" p-2 m-5 border pointer-event bg-white text-black text-decoration-none">Back</a>
@endsection



