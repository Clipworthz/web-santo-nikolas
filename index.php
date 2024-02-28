<?php
$conn = new mysqli("localhost", "root", "", "web_stnikolas");
if ($conn->connect_errno) {
    die("Failed to connect to MySQL: " . $conn->connect_error);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Santo Nikolas</title>

    <!-- Bootstrap Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <!-- My Custom Stylesheet -->
    <link rel="stylesheet" href="css/web-css.css">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=PT Sans Narrow' rel='stylesheet'>
</head>
<body>
    <!-- Top Navigation Bar -->
    <div class="topnav">
        <a class="active" href="login.php">Login Admin</a>
    </div>
    <!-- Bagian Banner -->
    <div class="mb-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-blue owl-carousel main-carousel position-relative overflow-hidden">
                    <img class="img-fluid" src="images/church-banner.jpg" style="object-fit: cover;">
                    <div class="overlay justify-content-center">
                        <div class="banner-title mb-2">
                            <h2>SANTO NIKOLAS DARI MYRA</h2>
                            <div class="button-container">
                                <button class="btn btn-md btn-secondary mr-2">Mulai Cari Tahu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bagian Banner End -->

    <!-- Bagian Artikel Pembuka -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Siapakah Santo Nikolas?</h4>
                            </div>
                            <div class="section-article bg-white p-3">
                                <p>Halo teman-teman terkasih!
                                Santa Claus merupakan salah satu karakter yang paling dikenal dan diingat saat Natal tiba. 
                                Tetapi, tahukah teman-teman kalau Santa Claus memiliki sejarah yang sangat menarik? Salah satu nya adalah 
                                bahwa Santa Claus berasal dari seorang Santo yang bernama Santo Nikolas! Yuk kita tonton sama-sama video di bawah ini agar 
                                bisa mengenal lebih dalam tentang siapa itu Santo Nikolas!</p>
                            </div>
                            <div class="section-video bg-white p-3 text-center">
                                <iframe width="1920" height="1080" src="https://www.youtube.com/embed/GkcUUdmE4DE" frameborder="0" allowfullscreen></iframe>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <!-- Bagian Biografi -->
                    <div class="mb-3">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Biografi</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <a href=""><img class="img-fluid" src="images/saint-nikolas.jpg"></a>
                            <h5 class="m-0 font-weight-bold my-3">Santo Nikolas</h5>
                            <table class="biodata">
                                <tr>
                                    <th>Perayaan</th>
                                    <td>6 Desember</td>
                                </tr>
                                <tr>
                                    <th>Lahir</th>
                                    <td>15 Maret 270</td>
                                </tr>
                                <tr>
                                    <th>Kota Asal</th>
                                    <td>Myra, Asia Kecil (Sekarang adalah Turki)</td>
                                </tr>
                                <tr>
                                    <th>Wafat</th>
                                    <td>6 Desember 343</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- Bagian Biografi End -->
                    <div class="mb-3">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Refrensi</h4>
                        </div>
                        <div class="bg-white text-left border border-top-0 p-3">
                            <a style="color: blue;" href="https://katakombe.org/para-kudus/desember/nikolas-dari-myra.html">Katakombe.org</a>
                            &nbsp;<b>-</b>&nbsp;
                            <a style="color: blue;" href="https://carmelia.net/index.php/artikel/riwayat-para-kudus/372-santo-nikolas-dari-mira?showall=1&limitstart=">Carmelia.net</a>
                            &nbsp;<b>-</b>&nbsp;
                            <a style="color: blue;" href="https://www.stnicholascenter.org/who-is-st-nicholas">StNicholasCenter.org</a>
                            &nbsp;<b>-</b>&nbsp;
                            <a style="color: blue;" href="https://www.britannica.com/biography/Saint-Nicholas">Britannica.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bagian Artikel Pembuka End -->

    <!-- Bagian Quiz -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="section-title justify-content-center">
                        <h4 class="m-0 text-uppercase font-weight-bold">Waktunya Quiz</h4>
                    </div>
                    <div class="section-article bg-white p-3 text-center">
                        <p>Wahh, gimana teman-teman? Teman-teman sudah mengenal siapa itu Santo Nikolas kan? Nahh, untuk melatih pemahaman teman-teman, silahkan klik tombol mini kuis dibawah ini dan jawab pertanyaan yang tertera yaa!</p>
                    </div>
                    <div class="section-video bg-white p-3 text-center">
                        <button class="btn btn-block btn-success" onclick="openPopupQuiz()">MULAI MENGERKJAKAN QUIZ</button>
                    </div>
                    <div class="section-article bg-white p-3 text-center">
                        <p>Semoga pembelajaran di atas bisa memberikan wawasan lebih untuk teman-teman tentang Santa Claus yaa, juga supaya teman-teman tahu kalau Santa Claus itu adalah seorang Santo pelindung anak-anak, loh!</p>
                        <b>Tuhan memberkati!</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Open Pop Up Quiz -->
    <div class="popup" id="popup-quiz">
        <h2 style="text-align: center;">Quiz Santo Nikolas!</h2>
        
        <div class="popup-quiz-body">
            <!-- Masukin Desain + Pertanyaan + Jawaban pake PHP Di Sini -->
            <form id="quiz-form">
            <?php 
                $conn = new mysqli("localhost", "root", "", "web_stnikolas");
                if ($conn->connect_errno) {
                    die("Failed to connect to MySQL: " . $conn->connect_error);
                }
                $sql ="SELECT q.id_questions, q.question_text, a.id_answers, a.answers_text, a.is_true_answers
                        FROM questions as q JOIN answers as a ON q.id_questions = a.id_questions";
                $res = $conn->query($sql);
                $questions = array(); // Array to store questions

                if ($res->num_rows > 0) {
                    // Store questions and answers in an array
                    while($row = $res->fetch_assoc()) {
                        $question_id = $row['id_questions'];
                        if (!isset($questions[$question_id])) {
                            $questions[$question_id] = array(
                                'question_text' => $row['question_text'],
                                'answers' => array()
                            );
                        }
                        $questions[$question_id]['answers'][] = array(
                            'id' => $row['id_answers'],
                            'text' => $row['answers_text'],
                            'is_true_answer' => $row['is_true_answers']
                        );
                    }
                    $number = 1;
                    // Display each question and its answers with radio buttons
                    foreach ($questions as $question_id => $question) {
                        echo "<h5 style= 'text-align: center;'>";
                        echo "<div><b>" . $number++ . '.&nbsp;' . $question['question_text'] . "</b></div>";
                        echo "<div>";
                        foreach ($question['answers'] as $answer) {
                            echo "<input type='radio' id='answer' name='answer_" . $question_id . "' value='" . $answer['is_true_answer'] . "'>&nbsp;" . $answer['text'] . "&nbsp;&nbsp;&nbsp;";
                        }
                        echo "</div></h5>";
                        echo "&nbsp;";
                    }
                } else {
                    echo "No questions found.";
                }

                $conn->close();
            ?>
            </form>
        </div>
        <div class="popup-quiz-footer text-center">
            <button class="btn btn-sm btn-success" onclick="submitQuiz()">SUBMIT QUIZ</button>
            <button class="btn btn-sm btn-danger" onclick="closePopupQuiz()">CANCEL</button>
        </div>
        <div id="custom-alert" class="custom-alert">
            <span id="alert-text" class="alert-text"></span>
        </div>
    </div>
    <!-- Bagian Quiz End -->

    <!-- Bagian Footer -->
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #0a335f;">
        <p class="m-0 text-center text-white" style="font-family: 'Open Sans',sans-serif">&copy; Dibuat Oleh David Danasuta</p> 
    </div>
    <!-- Bagian Footer End -->

    <script>
        function openPopupQuiz()
        {
            document.getElementById("popup-quiz").style.display = "block";
        }

        function closePopupQuiz()
        {
            document.getElementById("popup-quiz").style.display = "none";
        }

        function submitQuiz()
        {
            var quizForm = document.getElementById("quiz-form");
            var selectedOption = {};
            var mark = 0;
            var question = 0;
            
            var options = quizForm.querySelectorAll('input[type="radio"]');
            var totalQuestions = options.length / 3;
            options.forEach(option => {
                if(option.checked) {
                    var optionValue = option.value;

                    if(optionValue == 1)
                    {
                        question++
                        mark = mark+1;
                    }
                    else if(optionValue == 0)
                    {
                        question++
                    }
                }
            });

            if (question < totalQuestions) {
                alert ("Tidak bisa submit, silahkan isi semua jawaban terlebih dahulu");
                return;
            }

            var result = Math.round((mark/question)*100);

            if(result <= 50)
            {
                alert("Silahkan coba lagi, nilai anda adalah : " + result);
            }
            else if(result > 50 && result <= 75)
            {
                alert("Wah hampir saja, nilai anda adalah : " + result);
            }
            else if(result > 75)
            {
                alert("Hebat sekali, nilai anda adalah : " + result);
            }

            location.reload();
        }

    </script>


</body>
</html>
