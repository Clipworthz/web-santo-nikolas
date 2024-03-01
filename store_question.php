<?php 
$conn = new mysqli("localhost", "root", "", "web_stnikolas");
if ($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question_text = $_POST['question'];
    $answer1_text = $_POST['answer1'];
    $answer2_text = $_POST['answer2'];
    $answer3_text = $_POST['answer3'];
    $correct_answer = $_POST['correct_answer']; // Assuming this comes from the form

    $stmt_question = $conn->prepare("INSERT INTO questions (question_text) VALUES (?)");
    $stmt_question->bind_param("s", $question_text);
    $stmt_question->execute();

    $question_id = $stmt_question->insert_id;

    $stmt_answers = $conn->prepare("INSERT INTO answers (answers_text, is_true_answers, id_questions) VALUES (?, ?, ?)");
    $stmt_answers->bind_param("sii", $answer_text, $is_true_answer, $question_id);

    $answer_text = $answer1_text;
    $is_true_answer = ($correct_answer == 1) ? 1 : 0;
    $stmt_answers->execute();

    $answer_text = $answer2_text;
    $is_true_answer = ($correct_answer == 2) ? 1 : 0;
    $stmt_answers->execute();

    $answer_text = $answer3_text;
    $is_true_answer = ($correct_answer == 3) ? 1 : 0;
    $stmt_answers->execute();

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
} else{
    echo "Store Failed : " . $conn->error;
}

$conn->close();

?>
