<?php

$json = file_get_contents('Todo.json');
$jsonArray = json_decode($json, true);

$todoName = $_POST['todoChange'];
$jsonArray[$todoName]['completed'] = !$jsonArray[$todoName]['completed'];

file_put_contents('Todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));

header("Location: index.php");

?>