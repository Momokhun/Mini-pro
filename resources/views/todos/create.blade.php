@extends('todos.layout')

@section('content')
<div class="main-title">
    <h1>新しいタスクの作成</h1>
    <a href="{{route('todo.index')}}" class="btn" role="button"><span class="fas fa-arrow-left"></span></a>
</div>
    @if (session('message'))
        <div class="alert alert-success mt-4 mb-4">
             {{ session('message') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger mt-4 mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form method="post" action="{{route('todo.store')}}">
    @csrf
    <div class="title">
        <input type="text" name="title" placeholder="新しいタスク">
    </div>

    <div class="description">
        <textarea name="description" placeholder="詳細の追加"></textarea>
    </div>

    <div class="step">
        @livewire('step')
    </div>

    <div>
        <input class="btn btn-primary" type="submit" value="作成">
    </div>
</form>


@endsection
