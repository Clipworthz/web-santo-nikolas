<?php
    $conn = new mysqli("localhost", "root", "", "web_stnikolas");
    if ($conn->connect_errno) {
        die("Failed to connect to MySQL: " . $conn->connect_error);
    }

    var_dump($conn);

    $id_question = $_GET['id_question'];

    $sql_delete_answer = "DELETE FROM answers WHERE id_questions =" . $id_question;

    $result_delete_answer = $conn->query($sql_delete_answer);

    $sql_delete_question = "DELETE FROM questions WHERE id_questions =" . $id_question;

    $result_delete_question = $conn->query($sql_delete_question);
?>