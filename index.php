<?php

session_start();

require_once(__DIR__.'/config.php');
require_once(__DIR__.'/functions.php');
require_once(__DIR__.'/Todo.php');

// get todos
$todoApp =new \MyApp\Todo();
$todos = $todoApp->getAll();

// var_dump($todos);
// exit;

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" >
    <title>My todo</title>
</head>
<body>
    <div id="container">
        <h1>Todo</h1>
        <form action="" id="new_todo_form">
            <input type="text" id="new_todo" placeholder="what needs to be done?">
        </form>
        <ul id="todos">
        <?php foreach ($todos as $todo) : ?>
            <li id="todo_<?php echo h($todo->id); ?>" data-id="<?php echo h($todo->id); ?>">
                <input type="checkbox" class="update_todo"  <?php if ($todo->state ==='1') {echo 'checked';} ?>>
                <span class="todo_title <?php if ($todo->state ==='1') {echo 'done';} ?>"><?php echo h($todo->title); ?></span>
                <div class="delete_todo">X</div>
            </li>
        <?php endforeach; ?>
            <li id="todo_template" data-id="">
                <input type="checkbox" class="update_todo"  >
                <span class="todo_title "></span>
                <div class="delete_todo">X</div>
            </li>
        </ul>
    </div>
    <input type="hidden" id="token" value="<?php echo h($_SESSION['token']); ?>">
    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="todo.js"></script>
</body>
</html>