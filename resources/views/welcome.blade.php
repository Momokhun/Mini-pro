@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>ToDoリストへようこそ！</h1>
           <a href="{{ route('register') }}" class="btn btn-lg btn-primary">Sign up now!</a>            </div>
    </div>
@endsection

