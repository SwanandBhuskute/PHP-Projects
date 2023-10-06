<?php

    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';

    $todo = $_POST['todo'] ?? "";
    $todo = trim($todo);

    if($todo) {
        if(file_exists('Todo.json')) {
            $json =  file_get_contents('Todo.json');
            $jsonArray = json_decode($json, true);
            // echo '<pre>';
            // var_dump($jsonArray);
            // echo '</pre>';
            // echo $json;
        } else {
            $jsonArray = [];
        }
        $jsonArray[$todo] = ['completed' => false];
        file_put_contents('Todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
    }

    header('Location: index.php');

?>