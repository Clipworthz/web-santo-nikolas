<?php 
$conn = new mysqli("localhost", "root", "", "web_stnikolas");
if ($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $question_text = $_POST['question'];
    $answer1_text = $_POST['answer1'];
    $answer2_text = $_POST['answer2'];
    $answer3_text = $_POST['answer3'];
    $correct_answer = $_POST['correct_answer']; // Assuming this comes from the form

    // Insert question into questions table
    $stmt_question = $conn->prepare("INSERT INTO questions (question_text) VALUES (?)");
    $stmt_question->bind_param("s", $question_text);
    $stmt_question->execute();

    // Get the ID of the inserted question
    $question_id = $stmt_question->insert_id;

    // Insert answers into answers table
    $stmt_answers = $conn->prepare("INSERT INTO answers (answers_text, is_true_answers, id_questions) VALUES (?, ?, ?)");
    $stmt_answers->bind_param("sii", $answer_text, $is_true_answer, $question_id);

    // Insert answer 1
    $answer_text = $answer1_text;
    $is_true_answer = ($correct_answer == 1) ? 1 : 0;
    $stmt_answers->execute();

    // Insert answer 2
    $answer_text = $answer2_text;
    $is_true_answer = ($correct_answer == 2) ? 1 : 0;
    $stmt_answers->execute();

    // Insert answer 3
    $answer_text = $answer3_text;
    $is_true_answer = ($correct_answer == 3) ? 1 : 0;
    $stmt_answers->execute();

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

// Close database connection
$conn->close();

?>
