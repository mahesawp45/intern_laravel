<a href="{{ route('todo.show', ['todo' => $todo->id]) }}" class="todo-card">
    <div class="todo-title">
        <h4 class="inline-block">{{ $todo->title }}</h4>
    </div>
    <hr class="text-secondary">
    <div class="todo-slug">
        <p>{{ $todo->content }}</p>
    </div>
</a>
