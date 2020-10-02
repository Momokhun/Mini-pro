@extends('todos.layout')

@section('content')
<div class="main-title">
    <h1>タスクの変更</h1>
    <a href="{{route('todo.index')}}" class="btn" role="button"><span class="fas fa-arrow-left"></span></a>
</div>
    @if($errors->any())
        <div class="alert alert-danger mt-4 mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        {{-- @if (session('update'))
            <div class="alert alert-success mt-4 mb-4">
                 {{ session('update') }}
            </div>
        @endif --}}


<form method="post" action="{{route('todo.update', $todo->id)}}">
    @csrf
    @method('patch')
    <div class="title">
        <input type="text" name="title" value="{{$todo->title}}"  placeholder="Title">
    </div>
    <div class="description">
        <textarea name="description" placeholder="Description">{{$todo->description}}</textarea>
    </div>
    <div class="step">
        @livewire('edit-step', ['steps' => $todo->steps])
    </div>
    <div>
        <input class="btn btn-primary" type="submit" value="変更">
    </div>
</form>




@endsection
