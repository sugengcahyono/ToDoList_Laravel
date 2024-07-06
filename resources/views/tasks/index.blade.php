<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">To-Do List</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="title" class="form-control" placeholder="Add a new task" required>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
            </div>
        </form>

        <ul class="list-group">
            @foreach ($tasks as $task)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $task->title }}
                    @if (!$task->completed)
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-success btn-sm" type="submit">Mark as completed</button>
                        </form>
                    @else
                        <span class="badge badge-success">Completed</span>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
