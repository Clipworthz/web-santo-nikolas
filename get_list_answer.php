<?php
    $conn = new mysqli("localhost", "root", "", "web_stnikolas");
    if ($conn->connect_errno) {
        die("Failed to connect to MySQL: " . $conn->connect_error);
    }

    $id_question = $_GET['id_question'];

    $sql_answer = "SELECT id_answer, answer_text, is_true_answer, question_id
    FROM answers WHERE question_id = " . $id_question;

    $result_answer = $conn->query($sql_answer);

    if($result_answer->num_rows > 0)
    {
        $number = 1;
        while($row_answer = $result_answer->fetch_assoc()) {
            
            if($row_answer['is_true_answer'] == 1)
            {
                echo "<label for='answer'>Answer ". $number++." (True)</label><br>";
                echo "<input type='text' style='font-weight:600; margin-bottom:10px;' disabled='true' id='answer_'".$row_answer['id_answer']."name='answer_".$row_answer['id_answer']."' value='".$row_answer['answer_text']."'><br>";
            }
            else
            {
                echo "<label for='answer'>Answer ". $number++."</label><br>";
                echo "<input type='text' style='margin-bottom:10px;' disabled='true' id='answer_'".$row_answer['id_answer']."name='answer_".$row_answer['id_answer']."' value='".$row_answer['answer_text']."'><br>";
            }
        }
        echo "<br>";
    }
    else {
        echo "Opsi jawaban tidak ditemukan!";
    }
?>