@extends('todos.layout')

@section('content')
    <div class="d-flex justify-content-center pb-4 px-4">
        <h1 class="text-2x1 pb-4">{{$todo->title}}</h1>
        <a href="{{ route('todo.index') }}" class="mx-4 py-1 text-primary text-decoration-none">
            <span class="fas fa-arrow-left fa-2x"></span>
        </a>
    </div>
    <div>
        <div>
            <h3>Description</h3>
            <p>{{ $todo->description }}</p>
        </div>

        @if($todo->steps->count() > 0)
        <div class="py-4">
            <h3>Steps for this task</h3>
            @foreach((array)$todo->step as $step)
                <p>{{ $step}}</p>
            @endforeach
        </div>
        @endif
    </div>

@endsection



