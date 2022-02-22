@extends('todos.layout')

@section('content')
    <div class="d-inline-flex justify-content-center border-bottom pb-4">
        <h1 class="">All your Todos</h1>
        <a href="/todos/create" class=" py-2 px-2 mx-4 pointer-event rounded bg-dark text-white text-decoration-none">Create New</a>
    </div>

    <ul class="list-group my-4">
        <x-alert/>
        @foreach($todos as $todo)
            <li class="justify-content-center d-inline-flex py-2">
                <p>
                    {{ $todo->title }}
                </p>
                <a href="{{ '/todos/'.$todo->id. '/edit' }}" class=" py-2 px-2 mx-5 pointer-event rounded bg-black text-white text-decoration-none">Edit </a>
            </li>
        @endforeach
    </ul>
@endsection

