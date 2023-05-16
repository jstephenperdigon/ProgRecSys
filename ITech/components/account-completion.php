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
    <?php echo $fetch_info['firstName'] ?> | Home
</title>
<link rel="icon" type="image/x-icon" href="../img/logo.png">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        .contact-form {
            background: #fff;
            margin-top: 10%;
            margin-bottom: 5%;
            width: 70%;
            background: #ffff;
            border-radius: 5rem;

        }

        .contact-form .form-control {
            border-radius: 1rem;
            margin-bottom: 1rem;
        }

        .contact-form form {
            padding: 14%;
        }

        .contact-form form .row {
            margin-bottom: -7%;
        }

        .contact-form h3 {
            margin-bottom: 8%;
            margin-top: -10%;
            text-align: center;
            color: #5080ff;
            font-family: Montserrat;
        }

        .contact-form .btnContact {
            width: 50%;
            border: none;
            border-radius: 1rem;
            padding: 1.5%;
            background: #dc3545;
            font-weight: 600;
            color: #fff;
            cursor: pointer;
        }

        .btnContactSubmit {
            width: 50%;
            border-radius: 1rem;
            padding: 1.5%;
            color: #fff;
            background-color: #0062cc;
            border: none;
            cursor: pointer;
        }

        .contact-form label {
            text-align: center;
            color: #5080ff;
        }

        input[type="address"],
        input[type="password"],
        input[type="text"] {
            background: #f4f8f7;
            border: none;
            font-weight: 300;
            margin: 5px;
            padding: 10px;
            width: autopx;
        }
    </style>
</head>
<!-- Image and text -->

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
                        <button class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split" type="button"
                            id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </button>
                        <div class="dropdown-menu position-absolute" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="user-management.php">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout-user.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <div class="container-fluid contact-form shadow" style="margin-top: 200px;">
        <form method="post">
            <h3><b>ACCOUNT COMPLETION</b></h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="address" name="address" class="form-control"
                            placeholder="House No. or Lot No. / Road / Street /" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" id="barangay" name="barangay" class="form-control" placeholder="Barangay "
                            value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" id="zip" name="zip" class="form-control" placeholder="ZIP / Postal Code "
                            value="" />
                    </div>
                    <!-- UPLOAD FILE
                        <div class="form-group">
                            <label for="formFile" class="form-label">Upload your 1x1/ 2x2 picture (JPEG/PNG FILE)</label>
                            <input class="form-control" name="userpic" type="file" id="formFile">
                        </div> -->


                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="address" name="addressline2" class="form-control"
                            placeholder="Apartment, Suite , Unit, Bldg, floor, etc." value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" id="city" name="city" class="form-control" placeholder="City / Town"
                            value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" id="address" name="address" class="form-control" placeholder=" " value="" />
                    </div>


                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary me-md-2" type="button">Previous</button>
                    <button class="btn btn-primary" type="button">Next</button>
                </div>
            </div>
        </form>
    </div>


    <!-- IMPORTS -->
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