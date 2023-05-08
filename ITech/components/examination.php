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
    <!-- END IMPORTS -->

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
<div class="container">
<div class="mx-0 mx-sm-auto" style="margin-top: 120px;">
  <div class="card">
    <div class="card-header bg-primary">
      <h5 class="card-title text-white mt-2" id="exampleModalLabel">EXAMINATION</h5>
    </div>
    <div class="modal-body mt-5">
      <div class="text-center">
        <i class="far fa-file-alt fa-4x mb-3 text-primary"></i>
        <p>
          <strong>Please read carefully each questions.</strong>
        </p>
      </div>

      <hr />

      <form class="px-4 mt-5" action="">
        <p ><strong>QUESTION 1: </strong></p>

        <div class="form-check mb-2">
          <input class="form-check-input" type="radio" name="exampleForm" id="radio3Example1" />
          <label class="form-check-label" for="radio3Example1">
            Answer 1
          </label>
        </div>
        <div class="form-check mb-2">
          <input class="form-check-input" type="radio" name="exampleForm" id="radio3Example2" />
          <label class="form-check-label" for="radio3Example2">
            Answer 2
          </label>
        </div>
        <div class="form-check mb-2">
          <input class="form-check-input" type="radio" name="exampleForm" id="radio3Example3" />
          <label class="form-check-label" for="radio3Example3">
            Answer 3
          </label>
        </div>
        <div class="form-check mb-2">
          <input class="form-check-input" type="radio" name="exampleForm" id="radio3Example4" />
          <label class="form-check-label" for="radio3Example4">
            Answer 4
          </label>
        </div>
        <div class="form-check mb-2">
          <input class="form-check-input" type="radio" name="exampleForm" id="radio3Example5" />
          <label class="form-check-label" for="radio3Example5">
            Answer 5
          </label>
        </div>

      </form>
    </div>
    <div class="card-footer text-center" >
      <button type="button" class="btn btn-primary" style="box-shadow: none;">Submit</button>
    </div>
  </div>
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