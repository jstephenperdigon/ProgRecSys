<?php require_once "controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
  $sql = "SELECT * FROM usertable WHERE email = '$email'";
  $run_Sql = mysqli_query($con, $sql);
  if ($run_Sql) {
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $status = $fetch_info['status'];
    $code = $fetch_info['code'];
    if ($status == "verified") {
      if ($code != 0) {
        header('Location: reset-code.php');
      }
    } else {
      header('Location: user-otp.php');
    }
  }
} else {
  header('Location: ../index.php');
}
?>
<?php

$sql = "SELECT * FROM examinationtbl";
$questions = $con->query($sql);

$sequel = "SELECT * FROM examinationtbl";
$answers = $con->query($sequel);
?>
<!DOCTYPE html>
<html lang="en">
<title>
  <?php echo $fetch_info['firstName'] ?> | Examination
</title>
<link rel="icon" type="image/x-icon" href="../img/logo.png">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <!-- END IMPORTS -->
  <style>
    :root {
      --primary-color: rgb(11, 78, 179);
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    .container-body {
      align-items: center;
      margin-top: 200px;
    }

    body {
      /*height: 100vh; */
      /*display: flex; */
      /* align-items: center; */
      /* justify-content: center; */
    }

    /* Global Stylings */
    label {
      display: block;
      margin-bottom: 0.5rem;
    }

    input {
      display: block;
      width: 100%;
      padding: 0.75rem;
      border: 1px solid #ccc;
      border-radius: 0.25rem;
    }

    .width-50 {
      width: 50%;
    }

    .ml-auto {
      margin-left: auto;
    }

    .text-center {
      text-align: center;
    }

    /* Progressbar */
    .progressbar {
      position: relative;
      display: flex;
      justify-content: space-between;
      counter-reset: step;
      margin: 2rem 0 4rem;
    }

    .progressbar::before,
    .progress {
      content: "";
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      height: 4px;
      width: 100%;
      background-color: #dcdcdc;
      z-index: -1;
    }

    .progress {
      background-color: var(--primary-color);
      width: 0%;
      transition: 0.3s;
    }

    .progress-step {
      width: 2.1875rem;
      height: 2.1875rem;
      background-color: #dcdcdc;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .progress-step::before {
      counter-increment: step;
      content: counter(step);
    }

    .progress-step::after {
      content: attr(data-title);
      position: absolute;
      top: calc(100% + 0.5rem);
      font-size: 0.85rem;
      color: #666;
    }

    .progress-step-active {
      background-color: var(--primary-color);
      color: #f3f3f3;
    }

    /* Form */
    .form {
      width: clamp(1000px, 30%, 430px);
      margin: 0 auto;
      border: 1px solid #ccc;
      border-radius: 50px;
      padding: 1.5rem;
    }

    .form-step {
      display: none;
      transform-origin: top;
      animation: animate 0.5s;
    }

    .form-step-active {
      display: block;
    }

    .input-group {
      margin: 2rem 0;
    }


    /* Button */
    .btns-group {
      margin-top: 20px;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 1.5rem;
    }

    .btn-body{
      margin-top: 20px;
      padding: 0.75rem;
      display: block;
      text-decoration: none;
      background-color: var(--primary-color);
      color: #f3f3f3;
      text-align: center;
      border-radius: 0.25rem;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn:hover {
      box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color);
    }

    .input-group {
      margin: 1rem 0;

    }

    .answer {
      list-style-type: none;
      margin: 25px 0 0 0;
      padding: 0;

    }

    .answer input[type="radio"] {
      opacity: 0.01;
      z-index: 100;

    }

    .answer input[type="radio"]:checked+label,
    .Checked+label {
      background: #14a44d;
      border-radius: 20px;
      color: #fff;
    }

    .answer label {
      padding: 5px;
      border: 1px solid #CCC;
      cursor: pointer;
      z-index: 90;
      border-radius: 20px;
    }

    .answer label:hover {
      background: #4cc175;
      color: #fff;
    }
  </style>
</head>
<!-- Image and text -->

<body>

  <nav class="nav fixed-top navbar-light bg-white shadow">
    <div class="container">
      <div class="row justify-content-end align-items-center">
        <div class="col-auto ">
          <a class="navbar-brand" href="home.php"><img src="../img/logo.png" id="navLogo">
          </a>
        </div>
        <div class="col justify-content-start">
          Program Recommendation System
        </div>
        <div class="col text-center">
          <!-- Example split primary button -->
          <div class="btn-group">
            <button type="button" class="btn btn-primary">
              <?php echo $fetch_info['firstName'] ?>
            </button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
              data-mdb-toggle="dropdown" aria-expanded="false">
              <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
              <li> <a class="dropdown-item" href="user-completion.php">Settings</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li> <a class="dropdown-item" href="logout-user.php">Logout</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </nav>


  <div class="container" style="margin-top: 200px;">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="text-center mb-4">Time Remaining</h2>
        <div class="text-center">
          <h5 id="timer">01:00:00</h5>
        </div>
      </div>
    </div>
  </div>

  <form action="#" class="form container" method="POST">
    <h4 class="text-center">PART 1</h4>
    <!-- Progress bar -->
    <div class="progressbar">
      <div class="progress" id="progress"></div>
      <div class="progress-step progress-step-active" data-title=""></div>
      <div class="progress-step" data-title=""></div>
      <div class="progress-step" data-title=""></div>
      <div class="progress-step" data-title=""></div>
      <div class="progress-step" data-title=""></div>
      <div class="progress-step" data-title=""></div>
      <div class="progress-step" data-title=""></div>
      <div class="progress-step" data-title=""></div>
      <div class="progress-step" data-title=""></div>
      <div class="progress-step" data-title=""></div>
    </div>


    <!-- Steps -->
    <div class="form-step form-step-active">

      <h4 class="fw-bold text-center mt-3">
        <?php
        $row = mysqli_fetch_assoc($questions)
          ?>
        <?php echo $row["question"] ?>
      </h4>
      <ul class="answer text-center">
        <li>
          <input type="radio" id="choiceA" name="q1" />
          <label for="choiceA">
            <?php
        $row = mysqli_fetch_assoc($answers)
          ?>
        <?php echo $row["option1"] ?>
        </label>
        </li>
        <li>
          <input type="radio" id="choiceB" name="q1" />
          <label for="choiceB">ANSWER 2</label>
        </li>
        <li>
          <input type="radio" id="choiceC" name="q1" />
          <label for="choiceC">ANSWER 3</label>
        </li>
        <li>
          <input type="radio" id="choiceD" name="q1" />
          <label for="choiceD">ANSWER 4</label>
        </li>
      </ul>
      <div class="">
        <a href="#" class="btn-body btn-next width-50 ml-auto">Next</a>
      </div>
    </div>
    <div class="form-step">
      <h4 class="fw-bold text-center mt-3">
        <?php
        $row = mysqli_fetch_assoc($questions)
          ?>
        <?php echo $row["question"] ?>
      </h4>
      <ul class="answer text-center">
        <li>
          <input type="radio" id="choiceA1" name="q2" />
          <label for="choiceA1">ANSWER 1</label>
        </li>
        <li>
          <input type="radio" id="choiceB1" name="q2" />
          <label for="choiceB1">ANSWER 2</label>
        </li>
        <li>
          <input type="radio" id="choiceC1" name="q2" />
          <label for="choiceC1">ANSWER 3</label>
        </li>
        <li>
          <input type="radio" id="choiceD1" name="q2" />
          <label for="choiceD1">ANSWER 4</label>
        </li>
      </ul>
      <div class="btns-group">
        <a href="#" class="btn-body btn-prev">Previous</a>
        <a href="#" class="btn-body btn-next">Next</a>
      </div>
    </div>
    <div class="form-step">
      <h4 class="fw-bold text-center mt-3">
        <?php
        $row = mysqli_fetch_assoc($questions)
          ?>
        <?php echo $row["question"] ?>
      </h4>
      <ul class="answer text-center">
        <li>
          <input type="radio" id="choiceA2" name="q3" />
          <label for="choiceA2">ANSWER 1</label>
        </li>
        <li>
          <input type="radio" id="choiceB2" name="q3" />
          <label for="choiceB2">ANSWER 2</label>
        </li>
        <li>
          <input type="radio" id="choiceC2" name="q3" />
          <label for="choiceC2">ANSWER 3</label>
        </li>
        <li>
          <input type="radio" id="choiceD2" name="q3" />
          <label for="choiceD2">ANSWER 4</label>
        </li>
      </ul>
      <div class="btns-group">
        <a href="#" class="btn-body btn-prev">Previous</a>
        <input type="submit" value="Submit" class="btn-body" />
      </div>
    </div>
  </form>

  <script type="text/javascript" src="components_js/exam.js"></script>
  <!-- IMPORTS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
  <!-- MDB -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <!-- END IMPORTS -->
</body>

</html>