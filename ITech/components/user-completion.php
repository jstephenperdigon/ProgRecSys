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

<head>
  <!-- Required meta tags -->
  <title>User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/x-icon" href="../img/logo.png">

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
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>


  <nav class="nav fixed-top navbar-light bg-white shadow">
    <div class="container ">
      <div class="row justify-content-end align-items-center">
        <div class="col-auto ">
          <a class="navbar-brand" href="home.php"><img src="../img/logo.png" id="navLogo">
          </a>
        </div>
        <div class="col justify-content-start">
          Program Recommendation System
        </div>
        <div class="col text-center">

          <div class="btn-group">
            <button class="btn btn-primary btn-sm" type="button">
              <?php echo $fetch_info['firstName'] ?>
            </button>
            <button class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split" type="button" id="triggerId"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
            <div class="dropdown-menu" aria-labelledby="triggerId">
              <a class="dropdown-item" href="user-completion.php">Settings</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout-user.php">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <div class="container" style="padding-top: 144px;">
    <div class="row flex-lg-nowrap">
      <div class="col">
        <div class="row">
          <div class="col mb-3">
            <div class="card">
              <div class="card-body">
                <div class="e-profile">
                  <div class="row">
                    <div class="col-12 col-sm-auto mb-3">
                      <div class="mx-auto" style="width: 140px;">
                        <div class="d-flex justify-content-center align-items-center rounded"
                          style="height: 140px; background-color: rgb(233, 236, 239);">
                          <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>

                        </div>
                      </div>
                    </div>
                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                      <div class="text-center text-sm-left mb-2 mb-sm-0">
                        <h4 class="pt-sm-2 pb-1 mb-0 ">
                          <?php echo $fetch_info['lastName'] ?>,
                          <?php echo $fetch_info['firstName'] ?>
                        </h4>
                        <p class="mb-0">
                          <?php echo $fetch_info['email'] ?>
                        </p>
                        <!-- <div class="text-muted"><small>Last seen 2 hours ago</small></div> -->
                        <div class="mt-2">
                          <button class="btn btn-primary" type="button">
                            <span>Upload Photo</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <ul class="nav nav-tabs">
                    <li class="nav-item"><a href="" class="active nav-link">Account Settings</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Schedules</a></li>
                  </ul>
                  <div class="tab-content pt-3">
                    <div class="tab-pane active">
                      <form class="form" novalidate="">
                        <div class="row">
                          <div class="col">
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>First Name</label>
                                  <input class="form-control" type="text" name="name"
                                    value="<?php echo $fetch_info['firstName'] ?>">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label>Middle Name</label>
                                  <input class="form-control" type="text" name="name"
                                    value="<?php echo $fetch_info['middleInitial'] ?>">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label>Last Name</label>
                                  <input class="form-control" type="text" name="name"
                                    value="<?php echo $fetch_info['lastName'] ?>">
                                </div>
                              </div>

                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>Mobile Number</label>
                                  <input class="form-control" type="text" name="username"
                                    value="<?php echo $fetch_info['phoneNumber'] ?>">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label>Email</label>
                                  <input class="form-control" type="text" value="<?php echo $fetch_info['email'] ?>">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div><br>
                        <div class="row">
                          <div class="col d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit" >Save Changes</button>
                          </div>
                        </div>
                      </form>

                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>

</body>

</html>