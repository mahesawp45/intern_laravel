<div class="todo-menu">
    <a href="{{ route('todo.create') }}" class="todo-menu-item">
        <i class="fa-solid fa-circle-plus"></i>
        <p>Create Todo</p>
    </a>
    <a href="{{ route('recycle_bin') }}" class="todo-menu-item">
        <div class="recycle-bin">{{ count($deletedTodo) }} </div>
        <i class="fa-solid fa-trash"></i>
        <p>Recycle Bin</p>
    </a>
</div>
