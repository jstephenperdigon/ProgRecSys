<?php require_once "controllerUserData.php"; ?>

<?php
$email = $_SESSION['email'];
if ($email == false) {
  header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create a New Password</title>
  <link rel="icon" type="image/x-icon" href="../img/logo.png">
  <link rel="icon" type="image/x-icon" href="img/logo.png">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


  <style>
    .form-holder {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      min-height: 100vh;
    }

    .form-holder .form-content {
      position: relative;
      text-align: center;
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-align-items: center;
      align-items: center;
    }

    .form-content .form-items {
      padding: 40px;
      display: inline-block;
      width: 100%;
      min-width: 540px;
      -webkit-border-radius: 10px;
      -moz-border-radius: 10px;
      text-align: left;
      -webkit-transition: all 0.4s ease;
      transition: all 0.4s ease;
    }

    .form-content h3 {
      color: #fff;
      text-align: left;
      font-size: 28px;
      font-weight: 600;
      margin-bottom: 5px;
    }

    .form-content h3.form-title {
      margin-bottom: 30px;
    }

    .form-content p {
      color: #fff;
      text-align: left;
      font-size: 17px;
      font-weight: 300;
      line-height: 20px;
      margin-bottom: 30px;
    }


    .form-content label,
    .was-validated .form-check-input:invalid~.form-check-label,
    .was-validated .form-check-input:valid~.form-check-label {
      color: #fff;
    }

    .form-content input[type=text],
    .form-content input[type=password],
    .form-content input[type=email],
    .form-content select {
      width: 100%;
      padding: 9px 20px;
      text-align: left;
      border: 0;
      outline: 0;
      border-radius: 20px;
      background: #f4f8f7;
      font-size: 15px;
      font-weight: 300;
      color: #8D8D8D;
      -webkit-transition: all 0.3s ease;
      transition: all 0.3s ease;
      margin-top: 16px;
    }


    .btn-primary {
      background-color: #5080ff;
      outline: none;
      height: 50px;
      width: 200px;
      font-size: 17px;
      box-shadow: none;
      border-radius: 10px;
    }


    .form-content textarea {
      position: static !important;
      width: 100%;
      padding: 8px 20px;
      border-radius: 6px;
      text-align: left;
      background-color: #fff;
      border: 0;
      font-size: 15px;
      font-weight: 300;
      color: #8D8D8D;
      outline: none;
      resize: none;
      height: 120px;
      -webkit-transition: none;
      transition: none;
      margin-bottom: 14px;
    }

    .form-content textarea:hover,
    .form-content textarea:focus {
      border: 0;
      background-color: #ebeff8;
      color: #8D8D8D;
    }

    .mv-up {
      margin-top: -9px !important;
      margin-bottom: 8px !important;
    }

    .invalid-feedback {
      color: #ff606e;
    }

    .valid-feedback {
      color: #2acc80;
    }

    .formTitle .h3 {
      color: #5080ff;
    }



    #navLogo {

      /* Layout Properties */

      width: 100px;
      height: 100px;

    }



    input[type="email"],
    input[type="password"],
    input[type="text"] {
      background: #f4f8f7;
      border: none;
      font-size: 20px;
      margin: 5px;
      padding: 10px;
      width: 440px;
    }

    input[type="submit"] {
      background: #5080ff;
      border: none;
      font-weight: 500;
      margin: 5px;
      padding: 10px;
      width: 445px;
    }
  </style>
</head>

<body>

  <nav class="nav fixed-top navbar-light bg-white shadow">
    <div class="container ">
      <div class="row justify-content-end align-items-center">
        <div class="col-auto ">
          <a class="navbar-brand" href="../index.php"><img src="../img/logo.png" id="navLogo">
          </a>
        </div>
        <div class="col justify-content-start">
          Program Recommendation System
        </div>
        <div class="col text-center">

          <div class="btn-group">
          </div>
        </div>
      </div>
    </div>
  </nav>

  <?php
  if (count($errors) > 0) {
    ?>
    <div class="alert alert-danger text-center">
      <?php
      foreach ($errors as $showerror) {
        echo $showerror;
      }
      ?>
    </div>
    <?php
  }
  ?>
  <div class="container">
    <div class="form-body">
      <div class="row">
        <div class="form-holder">
          <div class="form-content shadow" style="border-radius: 50px;">
            <div class="form-items">
              <h3 style="color: #5080ff; " class="text-center">CHANGE PASSWORD</h3><br>
              <form action="new-password.php" method="post" class="requires-validation" id="passwordForm" novalidate>
                <div class="col-md-12">
                  <input class="form-control" type="password" name="password1" id="password1" placeholder="New Password"
                    required>
                  <div class="row">
                    <div class="col-sm-6">
                      <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters
                      Long<br>
                      <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase
                      Letter
                    </div>
                    <div class="col-sm-6">
                      <span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase
                      Letter<br>
                      <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Number
                    </div>
                  </div><br>
                  <div class="valid-feedback">Password field is valid!</div>
                  <div class="invalid-feedback">Password field cannot be blank!</div>
                </div>
                <div class="col-md-12">
                  <input class="form-control" type="password" name="password2" id="password2"
                    placeholder="Password Confirmation" required>
                  <div class="row">
                    <div class="col-sm-12">
                      <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords
                      Match
                    </div>
                  </div><br>
                  <div class="valid-feedback">Password field is valid!</div>
                  <div class="invalid-feedback">Password field cannot be blank!</div>
                </div>
                <div class="form-button mt-4">
                  <button id="submit" type="submit" name="change-password" class="btn btn-primary">CHANGE
                    PASSWORD</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>







  <script>
    $("input[type=password]").keyup(function () {
      var ucase = new RegExp("[A-Z]+");
      var lcase = new RegExp("[a-z]+");
      var num = new RegExp("[0-9]+");

      if ($("#password1").val().length >= 8) {
        $("#8char").removeClass("glyphicon glyphicon-remove");
        $("#8char").addClass("glyphicon glyphicon-ok");
        $("#8char").css("color", "#00A41E");
      } else {
        $("#8char").removeClass("glyphicon-ok");
        $("#8char").addClass("glyphicon-remove");
        $("#8char").css("color", "#FF0004");
      }

      if (ucase.test($("#password1").val())) {
        $("#ucase").removeClass("glyphicon-remove");
        $("#ucase").addClass("glyphicon-ok");
        $("#ucase").css("color", "#00A41E");
      } else {
        $("#ucase").removeClass("glyphicon-ok");
        $("#ucase").addClass("glyphicon-remove");
        $("#ucase").css("color", "#FF0004");
      }

      if (lcase.test($("#password1").val())) {
        $("#lcase").removeClass("glyphicon-remove");
        $("#lcase").addClass("glyphicon-ok");
        $("#lcase").css("color", "#00A41E");
      } else {
        $("#lcase").removeClass("glyphicon-ok");
        $("#lcase").addClass("glyphicon-remove");
        $("#lcase").css("color", "#FF0004");
      }

      if (num.test($("#password1").val())) {
        $("#num").removeClass("glyphicon-remove");
        $("#num").addClass("glyphicon-ok");
        $("#num").css("color", "#00A41E");
      } else {
        $("#num").removeClass("glyphicon-ok");
        $("#num").addClass("glyphicon-remove");
        $("#num").css("color", "#FF0004");
      }

      if ($("#password1").val() == $("#password2").val()) {
        $("#pwmatch").removeClass("glyphicon-remove");
        $("#pwmatch").addClass("glyphicon-ok");
        $("#pwmatch").css("color", "#00A41E");
      } else {
        $("#pwmatch").removeClass("glyphicon-ok");
        $("#pwmatch").addClass("glyphicon-remove");
        $("#pwmatch").css("color", "#FF0004");
      }
    });
  </script>

  <script>

    //Set Focus login-user
    const password = document.getElementById("password");
    const cpassword = document.getElementById("cpassword");

    setTimeout(() => {
      password.focus();
    }, 3000);

    $(document).ready(function () {
      $('#newPassword').modal('show');
    });


    var myInput = document.getElementById("password");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function () {
      document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function () {
      document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function () {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      // Validate length
      if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }
  </script>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</body>

</html>