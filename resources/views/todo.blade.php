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
        <input type="text" name="todo" id="todo" placeholder="Add your new todo" />
        <button type="submit">Submit</button>
    </form>
    <ul>
        <li>test <button>Delete</button></li>
        <li>test <button>Delete</button></li>
        <li>test <button>Delete</button></li>
        <li>test <button>Delete</button></li>
        <li>test <button>Delete</button></li>
    </ul>
</body>

</html>
