@extends('layouts.layout')

@section('content')

    @if ($todo != null)

    <div class="todo-single">
        <h2>{{ $todo->title }} </h2>

        <p class="mt-3"> {{ $todo->content }} </p>
    </div>

    @if ($todo->isDeleted == 0)
    <div class="container-button fixed-bottom mb-5 pe-5">
         <a href="/" class="btn btn-poli p-3">Back</a>
         <a href="{{ route('todo.edit', ['todo' => $todo->id]) }}" class="btn btn-poli p-3 mx-4 btn-edit">Edit</a>

         <form action="{{ route('todo.delete_todo', ['todo' => $todo->id]) }}" method="POST">
             @method('PUT')
             @csrf
             <button type="submit" class="btn p-3 btn-delete">Delete</button>
         </form>
     </div>
     @else
     <div class="container-button fixed-bottom mb-5 pe-5">
          <a href=" {{ route('recycle_bin') }} " class="btn btn-poli p-3">Back</a>
          <form action="{{ route('todo.restore_todo', ['todo' => $todo->id]) }}" method="POST">
              @method('PUT')
              @csrf
              <button type="submit" class="btn p-3 mx-4 btn-edit" >Restore</button>
          </form>
          <form action="{{ route('todo.destroy', ['todo' => $todo->id]) }}" method="POST">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn p-3 btn-delete" onclick="return confirm('Are you sure delete this todo forever?')" >Delete Forever</button>
          </form>
      </div>

    @endif
    @else
        <div class="todo-empty">
            <h4>Todo not found!, Let's make an awesome Todo</h4>
        </div>
    @endif
@endsection
