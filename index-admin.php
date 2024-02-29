<?php 
// session_start();
// if(!isset($_SESSION['username'])){
//     header("Location: login.php");
// }
$conn = new mysqli("localhost", "root", "", "web_stnikolas");
if ($conn->connect_errno) {
    die("Failed to connect to MySQL: " . $conn->connect_error);
} 

?>
<!DOCTYPE html>
<html lang="en">
<style>
    /* Style for pop-up */
    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #ffffff;
        border: 1px solid #ccc;
        padding: 20px;
        z-index: 9999;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }
    /* Style for overlay */
    .overlay {
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: rgba(0,0,0,0.5);
        z-index: 9998;
    }
</style>
<head>
    <script src="js/jquery-3.3.1.min.js"></script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Page Web Santo Nikolas</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/admin/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a style="font-size:20px; color:white; background-color:#0a335f;"class="navbar-brand brand-logo px-5" href="index-admin.php">Admin Santo Nikolas</a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <ul class="navbar-nav navbar-nav-right">
          <!-- <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="images/faces/face1.jpg" alt="image">
                <span class="availability-status online"></span>             
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black">David Greymaax</p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-cached mr-2 text-success"></i>
                Activity Log
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Signout
              </a>
            </div>
          </li> -->
          <!-- <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-email-outline"></i>
              <span class="count-symbol bg-warning"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <h6 class="p-3 mb-0">Messages</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                  <p class="text-gray mb-0">
                    1 Minutes ago
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                  <p class="text-gray mb-0">
                    15 Minutes ago
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                  <p class="text-gray mb-0">
                    18 Minutes ago
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">4 new messages</h6>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
              <span class="count-symbol bg-danger"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <h6 class="p-3 mb-0">Notifications</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-calendar"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                  <p class="text-gray ellipsis mb-0">
                    Just a reminder that you have an event today
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-settings"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                  <p class="text-gray ellipsis mb-0">
                    Update dashboard
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-link-variant"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                  <p class="text-gray ellipsis mb-0">
                    New admin wow!
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">See all notifications</h6>
            </div>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-format-line-spacing"></i>
            </a>
          </li> -->
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item" style="border-bottom:1px solid #0a335f">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title"><b>Mini Quiz</b></span>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item" style="border-bottom:1px solid #0a335f">
            <a class="nav-link" data-toggle="collapse" href="login.html" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title"><b>Logout</b></span>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title d-flex align-items-center">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>                 
              </span>
              <span class="ml-2">
                <b>Mini Quiz Dashboard</b>
              </span>
            </h3>
          </div>
          
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <!-- Button to open popup -->
                  <button class="btn btn-sm btn-info mb-3" onclick="openPopup()">Add New Question</button>
                  <h4 class="card-title"><b>Daftar Pertanyaan & Jawaban</b></h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th>
                              No.
                            </th>
                            <th>
                              Pertanyaan
                            </th>
                            <th style="width: 400px;">
                              Jawaban
                            </th>
                            <th>
                              Action
                            </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $sql_question = "SELECT id_questions, question_text
                      FROM questions GROUP BY id_questions";
                      
                      $number = 1;

                      $result_question = $conn->query($sql_question);

                      if($result_question->num_rows > 0) {
                        while($row_question = $result_question->fetch_assoc()) {
                          echo "<tr>";
                            echo "<td>". $number++ ."."."</td>";
                            echo "<td style='width:65%'>". $row_question["question_text"] ."</td>";
                            echo "<td><button class='btn btn-sm btn-success' onClick='openPopupOption(".$row_question['id_questions'].")'>TAMPILKAN OPSI</button></td>";
                            echo "<td><button class='btn btn-sm btn-danger' onClick='openPopupDelete(".$row_question['id_questions'].")'>HAPUS PERTANYAAN</button></td>";
                          echo "</tr>";
                        }
                      }
                      else {
                        echo "Tidak ada data pertanyaan!";
                      }
                      ?>
                      </tbody>
                    </table>
                    <!-- Open New Question Popup -->
                    <div class="popup" id="popup-new-question">
                      <h2>Add New Question</h2>
                      <form method="post" action="store_question.php">
                        <label for="question">Question:</label><br>
                        <input class="mb-2" type="text" id="question" name="question"><br>
                        <label for="answer1">Answer 1:</label><br>
                        <input class="mb-2" type="text" id="answer1" name="answer1"><br>
                        <label for="answer2">Answer 2:</label><br>
                        <input class="mb-2" type="text" id="answer2" name="answer2"><br>
                        <label for="answer3">Answer 3:</label><br>
                        <input class="mb-2" type="text" id="answer3" name="answer3"><br><br>
                        <label for="correct_answer">Correct Answer:</label><br>
                        <select id="correct_answer" name="correct_answer">
                          <option value="1">Answer 1</option>
                          <option value="2">Answer 2</option>
                          <option value="3">Answer 3</option>
                        </select><br><br>
                        <button class="btn btn-sm btn-success" type="submit">Add Question</button>
                        <button class="btn btn-sm btn-danger" type="button" onclick="closePopup()">Cancel</button>
                      </form>
                    </div>

                    <!-- Open Question Option Popup -->
                    <div class="popup" id="popup-question-option">
                      <h2 style="font-weight: 800;">Opsi Jawaban</h2>
                        <div id="popup-body">
                          <!-- Isi Konten dari Javascript -->
                          <br>
                        </div>
                      <button class="btn btn-sm btn-danger" type="button" onclick="closePopupOption()">Close</button>
                    </div>

                    <div class="popup" id="popup-question-delete">
                      <h2 style="text-align:center; font-weight: 800;">Apakah anda yakin akan menghapus pertanyaan ini?</h2>
                      <div id="popup-footer">

                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
<!-- JavaScript function to open and close popup -->
<script>
    function openPopup() {
        document.getElementById("popup-new-question").style.display = "block";
        // document.getElementById("overlay").style.display = "block";
    }

    function closePopup() {
        document.getElementById("popup-new-question").style.display = "none";
        // document.getElementById("overlay").style.display = "none";
    }

    function openPopupOption(question_id) {
        var id_question = question_id;

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            document.getElementById("popup-body").innerHTML = this.responseText;
            document.getElementById("popup-question-option").style.display = "block";
          }
        };

        xhr.open("GET","get_list_answer.php?id_question=" + id_question, true);
        xhr.send();
    }

    function closePopupOption() {
        document.getElementById("popup-question-option").style.display = "none";
        // document.getElementById("overlay").style.display = "none";
    }

    function openPopupDelete(question_id) {
        var id_question = question_id;

        var button = "<div style='text-align:center; margin-top: 20px;'>" +
        "<button type='button' class='btn btn-sm btn-danger mr-2' onclick='deleteQuestion("+id_question+")'>HAPUS</button>" +
        "<button type='button' class='btn btn-sm btn-info' onclick='closePopupDelete()'>CANCEL</button></div>";

        document.getElementById("popup-footer").innerHTML += button;

        document.getElementById("popup-question-delete").style.display = "block";
    }

    function closePopupDelete() {
      document.getElementById("popup-footer").innerHTML = "";
      document.getElementById("popup-question-delete").style.display = "none";
    }

    function deleteQuestion(question_id) {
        var id_question = question_id;

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            alert('Berhasil dihapus!');
            document.getElementById("popup-question-delete").style.display = "none";

            location.reload();
          }
        }

        xhr.open("GET","delete_question.php?id_question=" + id_question, true);
        xhr.send();
    }

    // JavaScript function to remove question row
    function removeQuestion(button) {
        var row = button.parentNode.parentNode;
        row.remove();
    }
</script>
</body>

</html>
