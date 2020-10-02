@if($todo->completed)
    <span onclick="event.preventDefault();
                    document.getElementById('form-incomplete-{{$todo->id}}')
                    .submit()"
                    class="fas fa-check done" ></span>
    <form method="post" action="{{route('todo.incomplete', $todo->id)}}" style="display:none" id="{{'form-incomplete-'.$todo->id}}">
    @csrf
    @method('delete')
    </form>

@else
    <span onclick="event.preventDefault();
                    document.getElementById('form-complete-{{$todo->id}}')
                    .submit()"
                    class="fas fa-check"></span>
    <form method="post" action="{{route('todo.complete', $todo->id)}}" style="display:none" id="{{'form-complete-'.$todo->id}}">
    @csrf
    @method('put')
    </form>
@endif
