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
      width: clamp(320px, 30%, 430px);
      margin: 0 auto;
      border: 1px solid #ccc;
      border-radius: 0.35rem;
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
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 1.5rem;
    }

    .btn {
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


  <div class="container-body">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2 class="text-center mb-4">Time Remaining</h2>
        <div class="text-center">
          <h5 id="timer">01:00:00</h5>
        </div>
      </div>
    </div>
  </div>

  <form action="#" class="form">
    <h4 class="text-center">EXAMINATION</h4>
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
      <h4 class="fw-bold text-center mt-3"></h4>
      <?php
       
        $query = mysqli_query($con, "select * from examinationtbl WHERE id = '1'");
        $row = mysqli_fetch_object($query);
        ?>
    
      <p><strong>1.<?php echo $row->question; ?> </strong></p>
     
      <form action="" method="post">
      <ul class="answer text-center">
        <li>
      
          <input type="radio" id="a25" name="amount" value="A" />
          <label for="a25"><?php echo $row->option1; ?></label>
         
        </li>
        <li>
          <input type="radio" id="a50" name="amount" value="B" />
          <label for="a50"><?php echo $row->option2; ?></label>
        </li>
        <li>
          <input type="radio" id="a75" name="amount"value="C" />
          <label for="a75"><?php echo $row->option3; ?></label>
        </li>
        <li>
          <input type="radio" id="a100" name="amount"value="D"/>
          <label for="a100"><?php echo $row->option4; ?></label>
        </li>
      </ul>
      <div class="">

        <a href="#" class="btn btn-next width-50 ml-auto">Next</a>


      </div>
    
    </div>
    <div class="form-step">
    <?php
       
       $query = mysqli_query($con, "select * from examinationtbl WHERE id = '2'");
       $row = mysqli_fetch_object($query);
       ?>
   
     <p><strong>2.<?php echo $row->question; ?> </strong></p>
     
          
     <ul class="answer text-center">
       <li>
         <input type="radio" id="a26" name="amount" value="A"/>
         <label for="a26"><?php echo $row->option1; ?></label>
       </li>
       <li>
         <input type="radio" id="a51" name="amount" value="B"/>
         <label for="a51"><?php echo $row->option2; ?></label>
       </li>
       <li>
         <input type="radio" id="a76" name="amount" value="C"/>
         <label for="a76"><?php echo $row->option3; ?></label>
       </li>
       <li>
         <input type="radio" id="a101" name="amount" value="D"/>
         <label for="a101"><?php echo $row->option4; ?></label>
       </li>
     </ul>
      <div class="btns-group">
        <a href="#" class="btn btn-prev">Previous</a>
        <a href="#" class="btn btn-next">Next</a>
      </div>
    </div>
    <div class="form-step">
    <?php
       
       $query = mysqli_query($con, "select * from examinationtbl WHERE id = '3'");
       $row = mysqli_fetch_object($query);
       ?>
   
     <p><strong>3.<?php echo $row->question; ?> </strong></p>
     
          
     <ul class="answer text-center">
       <li>
         <input type="radio" id="a257" name="amount" value="A"/>
         <label for="a257"><?php echo $row->option1; ?></label>
       </li>
       <li>
         <input type="radio" id="a52" name="amount" value="B"/>
         <label for="a52"><?php echo $row->option2; ?></label>
       </li>
       <li>
         <input type="radio" id="a72" name="amount" value="c"/>
         <label for="a72"><?php echo $row->option3; ?></label>
       </li>
       <li>
         <input type="radio" id="a102" name="amount" value="D"/>
         <label for="a102"><?php echo $row->option4; ?></label>
       </li>
     </ul>
      <div class="btns-group">
        <a href="#" class="btn btn-prev">Previous</a>
        <a href="#" class="btn btn-next">Next</a>
      </div>
    </div>
    <div class="form-step">
    <?php
       
       $query = mysqli_query($con, "select * from examinationtbl WHERE id = '4'");
       $row = mysqli_fetch_object($query);
       ?>
   
     <p><strong>4.<?php echo $row->question; ?> </strong></p>
     
          
     <ul class="answer text-center">
       <li>
         <input type="radio" id="1" name="amount" value="A"/>
         <label for="1"><?php echo $row->option1; ?></label>
       </li>
       <li>
         <input type="radio" id="2" name="amount" value="B"/>
         <label for="2"><?php echo $row->option2; ?></label>
       </li>
       <li>
         <input type="radio" id="3" name="amount" value="C"/>
         <label for="3"><?php echo $row->option3; ?></label>
       </li>
       <li>
         <input type="radio" id="4" name="amount" value="D"/>
         <label for="4"><?php echo $row->option4; ?></label>
       </li>
     </ul>
      <div class="btns-group">
        <a href="#" class="btn btn-prev">Previous</a>
        <a href="#" class="btn btn-next">Next</a>
      </div>
    </div>
        <div class="form-step">
    <?php
       
       $query = mysqli_query($con, "select * from examinationtbl WHERE id = '5'");
       $row = mysqli_fetch_object($query);
       ?>
   
     <p><strong>3.<?php echo $row->question; ?> </strong></p>
     
          
     <ul class="answer text-center">
       <li>
         <input type="radio" id="111" name="amount" value="A"/>
         <label for="111"><?php echo $row->option1; ?></label>
       </li>
       <li>
         <input type="radio" id="222" name="amount" value="B"/>
         <label for="222"><?php echo $row->option2; ?></label>
       </li>
       <li>
         <input type="radio" id="333" name="amount" value="c"/>
         <label for="333"><?php echo $row->option3; ?></label>
       </li>
       <li>
         <input type="radio" id="444" name="amount" value="D"/>
         <label for="444"><?php echo $row->option4; ?></label>
       </li>
     </ul>
      <div class="btns-group">
        <a href="#" class="btn btn-prev">Previous</a>
        <a href="#" class="btn btn-next">Next</a>
      </div>
    </div>
    <div class="form-step">
    <?php
       
       $query = mysqli_query($con, "select * from examinationtbl WHERE id = '6'");
       $row = mysqli_fetch_object($query);
       ?>
   
     <p><strong>3.<?php echo $row->question; ?> </strong></p>
     
          
     <ul class="answer text-center">
       <li>
         <input type="radio" id="555" name="amount" value="A"/>
         <label for="555"><?php echo $row->option1; ?></label>
       </li>
       <li>
         <input type="radio" id="666" name="amount" value="B"/>
         <label for="666"><?php echo $row->option2; ?></label>
       </li>
       <li>
         <input type="radio" id="777" name="amount" value="c"/>
         <label for="777"><?php echo $row->option3; ?></label>
       </li>
       <li>
         <input type="radio" id="888" name="amount" value="D"/>
         <label for="888"><?php echo $row->option4; ?></label>
       </li>
     </ul>
      <div class="btns-group">
        <a href="#" class="btn btn-prev">Previous</a>
        <a href="#" class="btn btn-next">Next</a>
      </div>
    </div>
    <div class="form-step">
    <?php
       
       $query = mysqli_query($con, "select * from examinationtbl WHERE id = '7'");
       $row = mysqli_fetch_object($query);
       ?>
   
     <p><strong>3.<?php echo $row->question; ?> </strong></p>
     
          
     <ul class="answer text-center">
       <li>
         <input type="radio" id="999" name="amount" value="A"/>
         <label for="999"><?php echo $row->option1; ?></label>
       </li>
       <li>
         <input type="radio" id="123" name="amount" value="B"/>
         <label for="123"><?php echo $row->option2; ?></label>
       </li>
       <li>
         <input type="radio" id="1234" name="amount" value="c"/>
         <label for="1234"><?php echo $row->option3; ?></label>
       </li>
       <li>
         <input type="radio" id="12345" name="amount" value="D"/>
         <label for="12345"><?php echo $row->option4; ?></label>
       </li>
     </ul>
      <div class="btns-group">
        <a href="#" class="btn btn-prev">Previous</a>
        <a href="#" class="btn btn-next">Next</a>
      </div>
    </div>
    <div class="form-step">
    <?php
       
       $query = mysqli_query($con, "select * from examinationtbl WHERE id = '8'");
       $row = mysqli_fetch_object($query);
       ?>
   
     <p><strong>3.<?php echo $row->question; ?> </strong></p>
     
          
     <ul class="answer text-center">
       <li>
         <input type="radio" id="12" name="amount" value="A"/>
         <label for="12"><?php echo $row->option1; ?></label>
       </li>
       <li>
         <input type="radio" id="13" name="amount" value="B"/>
         <label for="13"><?php echo $row->option2; ?></label>
       </li>
       <li>
         <input type="radio" id="14" name="amount" value="c"/>
         <label for="14"><?php echo $row->option3; ?></label>
       </li>
       <li>
         <input type="radio" id="15" name="amount" value="D"/>
         <label for="15"><?php echo $row->option4; ?></label>
       </li>
     </ul>
      <div class="btns-group">
        <a href="#" class="btn btn-prev">Previous</a>
        <a href="#" class="btn btn-next">Next</a>
      </div>
    </div>
    <div class="form-step">
    <?php
       
       $query = mysqli_query($con, "select * from examinationtbl WHERE id = '9'");
       $row = mysqli_fetch_object($query);
       ?>
   
     <p><strong>3.<?php echo $row->question; ?> </strong></p>
     
          
     <ul class="answer text-center">
       <li>
         <input type="radio" id="16" name="amount" value="A"/>
         <label for="16"><?php echo $row->option1; ?></label>
       </li>
       <li>
         <input type="radio" id="17" name="amount" value="B"/>
         <label for="17"><?php echo $row->option2; ?></label>
       </li>
       <li>
         <input type="radio" id="18" name="amount" value="c"/>
         <label for="18"><?php echo $row->option3; ?></label>
       </li>
       <li>
         <input type="radio" id="19" name="amount" value="D"/>
         <label for="19"><?php echo $row->option4; ?></label>
       </li>
     </ul>
      <div class="btns-group">
        <a href="#" class="btn btn-prev">Previous</a>
        <a href="#" class="btn btn-next">Next</a>
      </div>
    </div>
    <div class="form-step">
    <?php
       
       $query = mysqli_query($con, "select * from examinationtbl WHERE id = '10'");
       $row = mysqli_fetch_object($query);
       ?>
   
     <p><strong>3.<?php echo $row->question; ?> </strong></p>
     
          
     <ul class="answer text-center">
       <li>
         <input type="radio" id="a1" name="amount" value="A"/>
         <label for="a1"><?php echo $row->option1; ?></label>
       </li>
       <li>
         <input type="radio" id="a2" name="amount" value="B"/>
         <label for="a2"><?php echo $row->option2; ?></label>
       </li>
       <li>
         <input type="radio" id="a3" name="amount" value="c"/>
         <label for="a3"><?php echo $row->option3; ?></label>
       </li>
       <li>
         <input type="radio" id="a4" name="amount" value="D"/>
         <label for="a4"><?php echo $row->option4; ?></label>
       </li>
     </ul>
      <div class="btns-group">
        <a href="#" class="btn btn-prev">Previous</a>
       

        <input type="submit" value="Submit" name ="submit" action="controllerUserData.php"class="btn" />
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