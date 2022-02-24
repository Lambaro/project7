@extends('todos.layout')

@section('content')
    <div class="d-flex justify-content-between border-bottom pb-4 px-4">
        <h1 class="">All your Todos</h1>
        <a href="{{ route('todo.create') }}" class="mx-4 py-1 pointer-event text-primary text-decoration-none">
            <span class="fas fa-plus-circle fa-2x"></span>
        </a>
    </div>

    <ul class="list-group my-4">
        <x-alert/>
        @foreach($todos as $todo)
            <li class="justify-content-between d-inline-flex py-2">
                @include('todos.completeButton')

                @if($todo->completed)
                    <p>
                        <del>{{ $todo->title }}</del>
                    </p>
                @else
                    <p>{{ $todo->title }}</p>
                @endif
                <div>
                    <a href="{{ route('todo.edit', $todo->id) }}"
                       class="pointer-event text-warning text-decoration-none">
                        <span class="fas fa-edit fa-2x px-2"></span></a>

                    <span role="button" class="fas fa-trash text-danger fa-2x px-2"
                          onclick="event.preventDefault();
                          if(confirm('Are you sure to delete this List?'))
                          {
                          document.getElementById('form-delete-{{$todo->id}}')
                          .submit()
                          }">
                    </span>

                    <form id="{{ 'form-delete-' .$todo->id }}"
                          method="post" style="display:none"
                          action="{{ route('todo.destroy',$todo->id) }}">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection

