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
  <link rel="stylesheet" href="../css/style.css">
  <!-- END IMPORTS -->
  <style>
  </style>
</head>
<!-- Image and text -->

<body>



  <nav class="nav fixed-top navbar-light bg-white shadow">
    <div class="container">
      <div class="row justify-content-end align-items-center">
        <div class="col-auto ">
          <a class="navbar-brand" href="home.php"><img src="../img/logo.png" style="height: 100px; width: 100px; margin-top: 20px; margin-bottom: 20px;">
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



  <div class="tab-content" id="myTabContent0">
    <div class="tab-pane fade show active" id="home0" role="tabpanel" aria-labelledby="home-tab0">
      <!-- ======= Hero Section ======= -->
      <section id="hero" class="d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
              data-aos="fade-up" data-aos-delay="200">
              <h1>"Find out what you like doing best!"</h1>
              <h2>We are here to guide you!</h2>
              <div class="d-flex justify-content-center justify-content-lg-start">
                <a class="btn-get-started btn btn-primary" data-toggle="modal" data-target="#attentionModal">GET
                  STARTED</a>
                <script>
                  function () {
                    // Load up a new modal...
                    $('#attentionModal').modal('show')
                  }
                </script>
              </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
              <img src="../img/TOUR-1.png" class="img-fluid " alt="">
            </div>
          </div>
        </div>

      </section><!-- End Hero -->


      <!-- Modal -->
      <div class="modal fade" id="attentionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel"></h5>
              <button type="button" class="btn-close" data-dismiss="modal" title="Close" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              Do you want to proceed?
            </div>
            <div class="modal-footer">
              <a type="button" id="attnBttn" href="start-now.php" class="btn btn-primary">Proceed</a>
            </div>
          </div>
        </div>
      </div>
      <!-- ======= Why Us Section ======= -->
      <section id="why-us" class="why-us section-bg">
        <div class="container-fluid">

          <div class="row">

            <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

              <div class="content">
                <h3><strong> Programs</strong></h3>
                <p>

                </p>
              </div>

              <div class="accordion-list">
                <ul>
                  <li>
                    <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#accordion-list-1"><span></span>
                      COLLEGE OF LIBERAL ARTS<i class="bx bx-chevron-down icon-show"></i><i
                        class="bx bx-chevron-up icon-close"></i></a>
                    <div id="accordion-list-1" class="collapse" data-bs-parent=".accordion-list">
                      <p>
                        BS Psychology, BS Mathematics, BS Computer Science, BS Information System, BS Information
                        Technology, BS Entertainment and Multimedia Computing, Bachelor of Public Administration, BA
                        Communication, AB Political Science
                      </p>
                    </div>
                  </li>

                  <li>
                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span></span>
                      COLLEGE OF BUSINESS AND ACCOUNTANCY <i class="bx bx-chevron-down icon-show"></i><i
                        class="bx bx-chevron-up icon-close"></i></a>
                    <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                      <p>
                        Bachelor of Science in Office Administration (BSOAD), Bachelor of Science in Accounting
                        Information Technology (BSAIS), Bachelor of Science in Accountancy (BSA), Bachelor of Science in
                        Tourism Management (BSTM), Bachelor of Science in Hospitality Management (BSHM),
                        Bachelor of Science in Business Administration Major in Financial Management
                        (BSBA-FMGT),Bachelor of Science in Business Administration Major in Marketing Management
                        (BSBA-MKMGT), Bachelor of Science in Entrepreneurial Management (BSEM).
                      </p>
                    </div>
                  </li>

                  <li>
                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3"
                      class="collapsed"><span></span>COLLEGE OF EDUCATION<i class="bx bx-chevron-down icon-show"></i><i
                        class="bx bx-chevron-up icon-close"></i></a>
                    <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                      <p>
                        Bachelor in Elementary Education Major in Early Childhood Education (BEED EARLY CHILDHOOD
                        EDUCATION), Bachelor in Elementary Education Major in Special Education (BEED SPECIAL
                        EDUCATION),
                        Bachelor in Secondary Education Major in Technology and Livelihood Education (BSE TLE), Bachelor
                        in Secondary Education Major in Science (BSE Science), Bachelor in Secondary Education Major in
                        English (BSE English),
                        Bachelor in Secondary Education Major in English - Chinese, Certificate in Professional
                        Education, Elementary | Secondary | P.E..
                      </p>
                    </div>
                  </li>
                  <li>
                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4"
                      class="collapsed"><span></span>COLLEGE OF CRIMINOLOGY<i
                        class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                      <p>
                        BS Criminology
                      </p>
                    </div>
                  </li>


                </ul>
              </div>

            </div>

            <div class="col-lg-5 order-1 order-lg-2 img" style='background-image: url("../assets/img/TOUR-2.png");'>
              &nbsp;</div>
          </div>

        </div>
      </section><!-- End Why Us Section -->





      <section style="background-color:#fff;" class="d-flex align-items-center">
        <div class="container" id="team">
          <div class="row">
            <div class="col">
              <p class="fs-1 fw-bolder" style="color: #5080FF; font-size: 30px; font-family: Montserrat;"><b>PROGRAM
                  RECOMMENDATION SYSTEM</b></p><br>
              <p class="fs-4 " style=" font-family: Montserrat;">
                A browser-based system is a type of questionnaire in which,<br>
                according to the results and answers submitted by the user,<br>
                it identifies the most appropriate program based on the user's <br>
                specialization of knowledge.</p> <br><br>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <p class="fs-1 fw-bolder" style="color: #5080FF; font-size: 30px; font-family: Montserrat;"><b>OUR
                  TEAM</b></p><br>
            </div>
          </div>
          <div class="row  justify-content-center">
            <div class="col-auto">
              <div class="card" style="width: 12rem;">
                <!-- CARD IMAGE HERE
            <img class="card-img-top" src="img/UCC.png" alt="Card image cap">
           -->
                <div class="card-body">
                  <h5 class="card-title">Alexander Losaynon</h5>
                  <p class="card-text">Software Engineer</p>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="card" style="width: 12rem;">

                <div class="card-body">
                  <h5 class="card-title">Ervin Jefferson Mariano</h5>
                  <p class="card-text">Associate </p>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="card" style="width: 12rem;">

                <div class="card-body">
                  <h5 class="card-title">Christian Philip Orario</h5>
                  <p class="card-text">Programmer</p>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="card" style="width: 12rem;">

                <div class="card-body">
                  <h5 class="card-title">Lui Ritshane Butay</h5>
                  <p class="card-text">Programmer</p>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="card" style="width: 12rem;">

                <div class="card-body">
                  <h5 class="card-title">John Stephen Perdigon</h5>
                  <p class="card-text">Front End Designer</p>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="card" style="width: 12rem;">
                <div class="card-body">
                  <h5 class="card-title">Yasmine Gail Doctor</h5>
                  <p class="card-text">Front End Designer</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>


      <!-- Remove the container if you want to extend the Footer to full width. -->
      <!-- Footer -->
      <footer class="text-center text-lg-start text-white" style="background-color: #5080ff">
        <!-- Grid container -->
        <div id="footer" class="container p-4 pb-0">
          <!-- Section: Links -->
          <section class="">
            <!--Grid row-->
            <div class="row">
              <!-- Grid column -->
              <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">
                  Itech
                </h6>
                <p>
                  "Let us recommend the right program for you,
                  so you can focus on what you do best."
                </p>
              </div>
              <!-- Grid column -->

              <hr class="w-100 clearfix d-md-none" />

              <!-- Grid column 
           <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
            <p>
              <a class="text-white">Uccprgoramrecommendation</a>
            </p>
            <p>
              <a class="text-white">Uccprgoramrecommendation</a>
            </p>
            <p>
              <a class="text-white">Uccprgoramrecommendation</a>
            </p>
            <p>
              <a class="text-white">Uccprgoramrecommendationr</a>
            </p>
          </div>
          Grid column -->

              <hr class="w-100 clearfix d-md-none" />

              <!-- Grid column -->
              <hr class="w-100 clearfix d-md-none" />

              <!-- Grid column -->
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                <p><i class="fas fa-home mr-3"></i> Caloocan City, Philippines</p>
                <p><a href="#" style="color:#fff;"><i class="fas fa-envelope mr-3"></i> ucc.itech@gmail.com</p></a>
                <p><a href="#" style="color:#fff;"><i class="fas fa-phone mr-3"></i> +6391 5829 0523</p></a>
                <p><i class="fas fa-print mr-3"></i> +123 123</p>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

                <!-- Facebook -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i
                    class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i
                    class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!" role="button"><i
                    class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i
                    class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="#!" role="button"><i
                    class="fab fa-linkedin-in"></i></a>
                <!-- Github -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="#!" role="button"><i
                    class="fab fa-github"></i></a>
              </div>
            </div>
            <!--Grid row-->
          </section>
          <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
          © 2023 Copyright: Itech

          >
        </div>
        <!-- Copyright -->
      </footer>
      <!-- Footer -->

    </div>
    <div class="tab-pane fade" id="profile0" role="tabpanel" aria-labelledby="profile-tab0">
      Tab 2 content
    </div>
    <div class="tab-pane fade" id="contact0" role="tabpanel" aria-labelledby="contact-tab0">
      Tab 3 content
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
    <div class="modal-dialog modal-dialog-centered mw-100 container" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="container z-depth-1">
            <!--Section: Content-->
            <section class="px-md-5 mx-md-5 text-center dark-grey-text">

              <!--Grid row-->
              <div class="row d-flex justify-content-center">

                <!--Grid column-->
                <div class="col-xl-6 col-md-8">

                  <h3 class="font-weight-bold">WELCOME!</h3>

                  <p class="text-muted">Let us recommend the right program for you, so you can focus on what you do
                    best!</p>

                  <a class="btn btn-primary btn-md ml-0 mb-5" href="#" role="button" data-dismiss="modal">Start now<i
                      class="fa fa-magic ml-2"></i></a>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->


              <!--Grid row-->
              <div class="row justify-content-center">

                <!--First column-->
                <div class="col-lg-3 col-md-6">
                  <i class="fas fa-book fa-3x blue-text"></i>

                  <p class="font-weight-bold my-3">Take Exam</p>

                  <p class="text-muted">Determine your knowledge and skills.</p>
                </div>
                <!--/First column-->

                <!--Second column-->
                <div class="col-lg-3 col-md-6">
                  <i class="fas fa-list-check fa-3x teal-text"></i>

                  <p class="font-weight-bold my-3">View Results</p>

                  <p class="text-muted">Know what or where you excel and find out what's best for you!</p>
                </div>
                <!--/Second column-->

                <!--Third column-->
                <div class="col-lg-3 col-md-6">
                  <i class="fas fa-graduation-cap fa-3x indigo-text"></i>

                  <p class="font-weight-bold my-3">Take the program</p>

                  <p class="text-muted">Pick the suggested program where you are best.</p>
                </div>
                <!--/Third column-->
              </div>
              <!--/Grid row-->


            </section>
            <!--Section: Content-->
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function () {
      $('#welcomeModal').modal('show');

      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    });
  </script>

  <script type="text/javascript">

    $('#attentionModal').on('shown.bs.modal', function () {
      $('#attnBttn').trigger('focus')
    })
  </script>
  <script>
    if (window.history && window.history.pushState) {
      window.history.pushState('forward', null, './');
      $(window).on('popstate', function () {
        window.history.pushState('forward', null, './');
      });
    }
  </script>

  <!-- IMPORTS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>

  <!-- END IMPORTS -->
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
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