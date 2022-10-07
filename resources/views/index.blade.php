@extends('layouts.layout')

@section('content')




    @if ($todos != null)
        @foreach ($todos as $todo )

        @include('components.todo-card')
        @endforeach

    @else
    <div class="todo-empty">
            <h4>Empty.., Let's make an awesome Todo</h4>
        </div>
    @endif
@endsection
