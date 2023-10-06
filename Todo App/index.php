<?php
    $todos = [];
    if(file_exists('Todo.json')) {
        $json = file_get_contents('Todo.json');
        $todos = json_decode($json, true); 
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title> Todo App </title>
</head>
<body>
    <div class="container">
        <h1>Todo App Manager ⚡</h1>
        <div class="input-todo">
            <form action="newTodo.php" method="post">
                <label for="todo" >Todo:</label>
                <input type="text" name="todo" id="todo" placeholder="Enter your todo" required>
                <button type="submit" class="btn-add">Add Todo +</button>
            </form>
        </div>

        <?php
            foreach ($todos as $todoName => $todo) { ?>
                <div class="showtodo">
                    <div class="todo-item">
                        <form action="change_complete.php" method="post">
                            <input type="hidden" name="todoChange" value="<?php echo $todoName ?>">
                            <input type="checkbox" <?php echo $todo['completed'] ? 'checked' : '' ?>>
                        </form>
                        <h2><?php echo $todoName ?></h2> <br>
                        <form action="delete.php" method="post">
                            <input type="hidden" name="tododlt" value="<?php echo $todoName ?>">
                            <button class="btn-dlt">X</button>
                        </form>
                    </div>
                </div>
        <?php } ?>
    </div>

    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        checkboxes.forEach(ch => {
            ch.onclick = function () {
                this.parentNode.submit();
            }
        });
    </script>
</body>
</html>
