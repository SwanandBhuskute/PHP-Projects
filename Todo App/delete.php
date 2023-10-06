<?php

$json = file_get_contents('Todo.json');
$jsonArray = json_decode($json, true);

$todoName = $_POST['tododlt'];
unset($jsonArray[$todoName]);

file_put_contents('Todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));

header("Location: index.php");

?>