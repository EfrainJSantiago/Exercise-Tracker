<?php
    $dsn = 'mysql:host=localhost;dbname=exercise_tracker';
    $username = 'exercise_user';
    $password = 'pa55word';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>