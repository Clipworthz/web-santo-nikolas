<?php 
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

    // Create connection
    $conn = new mysqli("localhost", "root", "", "web_stnikolas");

    // Check connection
    if ($conn->connect_error) {
        die("Failed to connect to MySQL: " . $conn->connect_error);
    }

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
    $is_true_answer = ($correct_answer == 1) ? 1 : 0; // Check if answer 1 is the correct answer
    $stmt_answers->execute();

    // Insert answer 2
    $answer_text = $answer2_text;
    $is_true_answer = ($correct_answer == 2) ? 1 : 0; // Check if answer 2 is the correct answer
    $stmt_answers->execute();

    // Insert answer 3
    $answer_text = $answer3_text;
    $is_true_answer = ($correct_answer == 3) ? 1 : 0; // Check if answer 3 is the correct answer
    $stmt_answers->execute();

    // Close statements and connection
    $stmt_question->close();
    $stmt_answers->close();
    $conn->close();

    // Redirect back to the page where the form was submitted
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

// Retrieve questions and answers from database
$sql = "SELECT q.id_questions, q.question_text, GROUP_CONCAT(a.answers_text) as answers_text 
        FROM questions as q 
        JOIN answers as a ON q.id_questions = a.id_questions 
        GROUP BY q.id_questions, q.question_text";

$result = $conn->query($sql);

if (!$result) {
    echo "Error: " . $conn->error;
}

if ($result->num_rows > 0) {
    // Display questions and answers
    while($row = $result->fetch_assoc()) {
        echo "<table border='0' style='border-collapse: separate; width: 100%;'>";
        echo "<tr>";
        echo "<td style='width: 650px; padding: 10px;'>{$row['question_text']}</td>";
        echo "<td style='width: 300px; padding: 10px;'>{$row['answers_text']}</td>";
        echo "<td style='padding: 10px;'><button class='btn btn-danger' onclick='removeQuestion(this)'>HAPUS PERTANYAAN</button></td>";
        echo "</tr>";
        echo "</table>";
    }
} else {
    echo "0 results";
}

// Close database connection
$conn->close();

?>
