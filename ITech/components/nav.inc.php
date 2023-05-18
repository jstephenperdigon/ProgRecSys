<?php require_once "controllerUserData.php"; ?>
<?php require('connection.php');
if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {

  $id = $_COOKIE['email'];
  $pass = $_COOKIE['password'];
} else {
  $id = "";
  $pass = "";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="icon" type="image/x-icon" href="img/logo.png">
  <title> Program Recommendation System </title>
  <!-- <script type="text/javascript">    
             window.history.forward();
             function noBack() { 
                  window.history.forward(); 
             }
             
        </script> -->
  <!-- IMPORTS -->
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!-- END IMPORTS -->

  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- END IMPORTS -->



</head>

<style>
  @import "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css";


  #container {
    height: auto;
    width: 1000px;
  }

  #cover h1 {
    padding-top: 38%;
  }

  #input1 {
    font-weight: 300;
    margin: 6px;
    padding: 5px;

  }

  a,
  a:hover {}

  .input-group {
    margin-top: 5px;

  }

  @media (min-width: 576px) {
    .modal-dialog {
      max-width: 400px;

      .modal-content {
        padding: 1rem;
      }
    }
  }

  .modal-header {
    .close {
      margin-top: -2.5rem;
    }
  }

  .form-title {
    margin: -2rem 0rem 2rem;
  }

  .btn-round {
    border-radius: 3rem;
  }

  .delimiter {
    padding: 1rem;
  }

  .social-buttons {
    .btn {
      margin: 0 0.5rem 1rem;
    }
  }

  .signup-section {
    padding: 0.3rem 0rem;
  }
</style>


<body>

  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow ">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="img/logo.png" id="navLogo"></a>
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Program Recommendation System <span class="sr-only"></span></a>
          </li>
        </ul>
        <form class="form-inline justify-content-center my-2 my-lg-0">
          <button type="button" class="btn justify-content-center my-2 my-sm-0" style="box-shadow: none;"
            data-toggle="modal" data-target="#loginModal">
            SIGN IN
            <i class='bx-fw bx bx-user bx-lg'></i>
          </button>
        </form>
      </div>
    </div>
  </nav>



  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <?php
    if (count($errors) > 0) {
      ?>
      <div class="d-flex p-2 justify-content-center">
        <div class="position-fixed ">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?php
            foreach ($errors as $showerror) {
              echo $showerror;
            }
            ?>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="border-radius: 20px;">
        <div class="modal-header border-bottom-0">
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-title text-center">
            <h1 class="">SIGN IN</h1>
            <hr class="hr" />
            <!-- <div class="d-flex flex-column text-center">

            <button onclick="window.location = '<?php echo $login_url; ?>'" type="submit"
                class="btn btn-primary btn-block mb-4 mt-2"><i class="fa-brands fa-google"></i> SIGN IN WITH
                GOOGLE</button> -->
            <!-- </div>
            <hr class="hr" /> OR
          </div> -->
            <div class="d-flex flex-column text-center">
              <form class="needs-validation" action="index.php" method="POST" autocomplete="" novalidate>
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="username" name="email" class="form-control" value="<?php echo $id ?>"
                    required />
                  <label class="form-label" for="username">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline input-group mb-4">
                  <input type="password" id="loginpass" class="form-control" name="password" value="<?php echo $pass ?>"
                    required />
                  <label class="form-label" for="loginpass">Password</label>
                  <div class="input-group-append" role="button" title="veiw password" id="passBtn">
                    <span class="input-group-text" style="background: #fff; border: none;">
                      <i class=" far fa-eye fa-eye-slash" id="togglePassword" style="cursor: pointer;"
                        aria-hidden="true"></i>
                    </span>
                  </div>
                  <script>
                    //*<-----Show password script----->
                    const togglePassword = document.querySelector('#togglePassword');
                    const password = document.querySelector('#loginpass');
                    togglePassword.addEventListener('click', function (e) {
                      // toggle the type attribute
                      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                      password.setAttribute('type', type);
                      // toggle the eye slash icon
                      this.classList.toggle('fa-eye-slash');
                    });
                  </script>
                </div>


                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="form2Example31" name="remember_me"
                        checked />
                      <label class="form-check-label" for="form2Example31"> Remember me </label>
                    </div>
                  </div>

                  <div class="col">
                    <!-- Simple link -->
                    <a href="#!" data-target="#pwdModal" data-toggle="modal" data-dismiss="modal"
                      onClick="$('#loginModal').modal('hide')">Forgot password?</a>
                    <script>
                      $('#loginModal').on('hidden.bs.modal', function () {
                        // Load up a new modal...
                        $('#pwModal').modal('show')
                      })
                    </script>
                  </div>
                </div>
                <!-- Submit button -->
                <button type="submit" name="login" onclick="return myFunction()"
                  class="btn btn-primary btn-block mb-4">Sign in</button>
                <!-- Register buttons -->
                <div class="text-center">
                  <p>Not a member? <a href="components/signup-user.php">Register</a></p>

                </div>
              </form>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Forgot Password Modal -->
  <div id="pwdModal" class="modal fade" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <?php
        if (count($errors) > 0) {
          ?>
          <div class="alert alert-danger text-center">
            <?php
            foreach ($errors as $error) {
              echo $error;
            }
            ?>
          </div>
          <?php
        }
        ?>
        <div class="modal-body">
          <form action="index.php" method="POST" autocomplete="">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="forgotPasswordEmail" name="email" placeholder="Email"
                autofocus required>
              <label for="forgotPasswordEmail">Email Address</label>
            </div>



            <button type="button" class="btn btn-secondary" data-dismiss="modal" data-target="#loginModal"
              data-toggle="modal" aria-hidden="true">Close</button>
            <button type="submit" class="btn btn-primary" name="check-email">Send One-Time Password</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Forgot Passwor Modal -->




  <!-- Modal -->
  <div class="modal fade" id="cookieconsent2" tabindex="-1" aria-labelledby="cookieconsentLabel2" aria-hidden="true"
    data-mdb-backdrop="static" data-mdb-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="cookieconsentLabel2">Cookies & Privacy</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-3 d-flex align-items-center justify-content-center">
              <i class="fas fa-cookie-bite fa-4x text-primary"></i>
            </div>

            <div class="col-9">
              <p>This website uses cookies to ensure you get the best experience on our website.<a class="d-block"
                  href="#">Read more about cookies</a></p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-mdb-dismiss="modal">Reject</button>
          <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">
            Accept
          </button>
        </div>
      </div>
    </div>
  </div>



  <!-- MODAL FUNCTION -->
  <!-- $(window).on('load',function() {
        $('#LoginModal').modal('show');	
        });
        -->
  <!-- END MODAL FUNCTION -->

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


  <script>
    var myModal = document.getElementById('loginModal')
    var myInput = document.getElementById('username')

    myModal.addEventListener('shown.bs.modal', function () {
      myInput.focus()
    })

    $(document).ready(function () {
      $('#loginModal').modal('show');

      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    });
  </script>

  <script>

    // ENABLE TOOL TIPS //

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    $(document).ready(function () {
      $('input').tooltip();
    });
        // END ENABLE TOOL TIPS //


  </script>

  <!-- PASSWORD VALIDATION -->
  <script>
  </script>
  <!-- END PASSWORD VALIDATION -->

  <script>
    $(".autobutton").click(
      function (event) {
        var nv = $(this).html();
        var nv2 = '<span class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></span> ' + nv;
        $(this).html(nv2);
        var form = $(this).parents('form:first');

        $(this).block({ message: null });
        form.submit();
      });   
  </script>

  <script>

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()

  </script>

  <!-- LOGIN MODAL SHOW ON LOAD -->
  <script>

    // $(window).on('load',function() {
       // $('#LoginModal').modal('show');
    //});

    //$(document).ready(function() {
    //$('#LoginModal').modal('show');
    //});

    //$('.alert').alert()

  </script>
  <!-- LOGIN MODAL SHOW ON LOAD -->

</body>

</html>