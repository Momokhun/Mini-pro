@extends('todos.layout')

@section('content')
<div class="main-title">
    <h1>{{$todo->title}}</h1>
    <a href="{{route('todo.index')}}" class="btn" role="button"><span class="fas fa-arrow-left"></span></a>
</div>


<div>
    <div>
        <h3>詳細</h3>
        <p>{{$todo->description}}</p>
    </div>

@if($todo->steps->count() > 0)
    <div>
    <h3 class="steps-name">サブタスク</h3>
    @foreach ($todo->steps as $step)
    <p>{{$step->name}}</p>
    @endforeach
    </div>
@endif
</div>


@endsection
