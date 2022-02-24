@if($todo->completed)
    <span class="fas fa-check text-success fa-2x px-2"  role="button" onclick="event.preventDefault();
        document.getElementById('form-incomplete-{{$todo->id}}')
        .submit();"></span>

    <form id="{{ 'form-incomplete-' .$todo->id }}"
          method="post" style="display:none"
          action="{{ route('todo.incomplete',$todo->id) }}">
        @csrf
        @method('delete')
    </form>

@else
    <span onclick="event.preventDefault(); document.getElementById('form-complete-{{$todo->id}}')
        .submit();" role="button"
          class="fas fa-check fa-2x pointer-event text-info px-2"></span>

    <form id="{{ 'form-complete-' .$todo->id }}"
          method="post" style="display:none"
          action="{{ route('todo.complete',$todo->id) }}">
        @csrf
        @method('put')
    </form>
@endif
