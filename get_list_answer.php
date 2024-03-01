<?php
    $conn = new mysqli("localhost", "root", "", "web_stnikolas");
    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
    }

    $id_question = $_GET['id_question'];

    $sql_answer = "SELECT id_answers, answers_text, is_true_answers, id_questions
    FROM answers WHERE id_questions = " . $id_question;

    $result_answer = $conn->query($sql_answer);

    if($result_answer->num_rows > 0)
    {
        $number = 1;
        while($row_answer = $result_answer->fetch_assoc()) {
            
            if($row_answer['is_true_answers'] == 1)
            {
                echo "<label for='answer'>Answer ". $number++." (True)</label><br>";
                echo "<input type='text' style='font-weight:600; margin-bottom:10px;' disabled='true' id='answer_'".$row_answer['id_answers']."name='answer_".$row_answer['id_answers']."' value='".$row_answer['answers_text']."'><br>";
            }
            else
            {
                echo "<label for='answer'>Answer ". $number++."</label><br>";
                echo "<input type='text' style='margin-bottom:10px;' disabled='true' id='answer_'".$row_answer['id_answers']."name='answer_".$row_answer['id_answers']."' value='".$row_answer['answers_text']."'><br>";
            }
        }
        echo "<br>";
    }
    else {
        echo "Opsi jawaban tidak ditemukan!";
    }
    $conn->close();
?>