@extends('todos.layout')

@section('content')
<div class="main-title">
    <h1>タスクリスト</h1>
    <a href="{{route('todo.create')}}" class="btn" role="button"><span class="fas fa-plus-circle"></span></a>
</div>

<ul class="tasklist">
    @if (session('message'))
            <div class="alert alert-success mt-4 mb-4">
                 {{ session('message') }}
            </div>
    @endif


    @forelse ($todos as $todo)
    <li class="container">
       <div>
            @include('todos.complete-btn')
       </div>

        @if($todo->completed)
        <a href="{{route('todo.show', $todo->id)}}" class="task-name">{{$todo->title}}</a>
        @else
        <a href="{{route('todo.show', $todo->id)}}" class="taskName">{{$todo->title}}</a>
        @endif

        <div>
            <a href="{{route('todo.edit', $todo->id)}}" class="btn" role="button"><span class="fas fa-edit"></span></a>

            <span onclick="event.preventDefault();
                            if (window.confirm('タスクを削除します。よろしいですか?')) {
                                document.getElementById('form-delete-{{$todo->id}}')
                                .submit();
                            }"
                            class="fas fa-trash"></span>
            <form method="post" action="{{route('todo.destroy', $todo->id)}}" style="display:none" id="{{'form-delete-'.$todo->id}}">
                @csrf
                @method('delete')
            </form>
        </div>

    </li>
    @empty
            <p>No task available, create one.</p>
    @endforelse
</ul>

@endsection
