<?php require_once "controllerUserData.php"; ?>

<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<title><?php echo $fetch_info['firstName'] ?> | Instruction </title>
<link rel="icon" type="image/x-icon" href="../img/logo.png">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- MDB -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../css/style.css">
        <!-- END IMPORTS -->
      <style>
      </style>
</head>
     <!-- Image and text -->
    
<body>


<nav class="nav fixed-top navbar-light bg-white shadow"  >
    <div class="container">
        <div class="row justify-content-end align-items-center">  
            <div class="col-auto ">
                <a class="navbar-brand" href="home.php"><img src="../img/logo.png"  id="navLogo">
                 </a>
            </div>
            <div class="col justify-content-start">
            Program Recommendation System 
            </div>
            <div class="col text-center">
            <!-- Example split primary button -->
            <div class="btn-group">
              <button type="button" class="btn btn-primary"><?php echo $fetch_info['firstName'] ?></button>
              <button
                type="button"
                class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                data-mdb-toggle="dropdown"
                aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu">
                <li> <a class="dropdown-item" href="user-completion.php">Settings</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>  <a class="dropdown-item" href="logout-user.php">Logout</a></li>
              </ul>
            </div>
  
            </div>
        </div>
    </div>
</nav>


<div class="container py-5" style="margin-top: 120px; ">
      <h1 class="text-center my-5">Instructions</h1>

      <div class="row">
        <div class="col-md-6">
          <h2>System Requirements</h2>
          <p>Ensure that your computer or mobile device is compatible with the examination platform. Also, make sure that you have a stable internet connection.</p>
        </div>

        <div class="col-md-6">
          <h2>Technical Difficulties</h2>
          <p>In case of any technical issues, inform the exam administrator immediately. Avoid restarting or refreshing the page unless advised by the administrator.</p>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-6">
          <h2>Exam Rules</h2>
          <p>Read and follow the exam rules carefully. Make sure you understand the exam instructions and what is expected of you.</p>
        </div>

        <div class="col-md-6">
          <h2>Time Management</h2>
          <p>Monitor your time carefully during the exam. Make sure you allocate enough time for each question and section. Don't spend too much time on a single question, as this may reduce the time you have for the rest of the exam.</p>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-6">
          <h2>Cheating</h2>
          <p>Cheating is strictly prohibited. Make sure you are not receiving any unauthorized help during the exam. Any cheating attempt will lead to disqualification from the exam.</p>
        </div>

        <div class="col-md-6">
        <div class="text-center ">
        <a type="submit" class="btn btn-primary btn-lg text-center" href="examination.php" style="box-shadow: none; font-size: 20px;">START NOW</a>
      </div>
        </div>
      </div>
      <!-- Default checkbox -->
      <div class="form-check mt-5">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"  checked required/>
        <p class="form-check-label" for="flexCheckDefault">I fully understand the instructions.</p>
      </div>
    </div>


    <!-- IMPORTS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <!-- MDB -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    <!-- END IMPORTS -->
</body>
</html>  