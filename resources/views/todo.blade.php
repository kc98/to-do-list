<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
</head>

<body>
    <h1>Todo List</h1>
    <form action="/todo" method="post">
        @csrf
        <input type="text" name="todo" id="todo" placeholder="Add your new todo"
            class="@error('todo') is-invalid @enderror" />
        <button type="submit">Submit</button>

        @error('todo')
            <div style="color: red">{{ $message }}</div>
        @enderror
    </form>
    <ul>
        @if ($todos)
            @foreach ($todos as $todo)
                <li>{{ $todo->todo }} <button>Delete</button></li>
            @endforeach
        @else
            <p>No todo, create one now!</p>
        @endif
    </ul>
</body>

</html>
