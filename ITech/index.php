<?php require_once "components/controllerUserData.php"; ?>
<?php include 'components/nav.inc.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Program Recommendation System </title>
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
  <link rel="stylesheet" href="css/modal.css">
  <link rel="stylesheet" href="css/cookies.css">
  <!-- END IMPORTS -->

  <style>
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }


    #h1 {
      font-family: Montserrat;
      font-weight: bolder;
      font-size: 50px;
    }
  </style>

</head>

<body>


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
          data-aos="fade-up" data-aos-delay="200">
          <h1>"Find out what you like doing best!"</h1>
          <h2>We are here to guide you!</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a class="btn-get-started btn btn-primary" data-toggle="modal" data-target="#loginModal">GET STARTED</a>

          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/TOUR-1.png" class="img-fluid " alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
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
                <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#accordion-list-1"><span></span> COLLEGE
                  OF LIBERAL ARTS<i class="bx bx-chevron-down icon-show"></i><i
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
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span></span> COLLEGE
                  OF BUSINESS AND ACCOUNTANCY <i class="bx bx-chevron-down icon-show"></i><i
                    class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Bachelor of Science in Office Administration (BSOAD), Bachelor of Science in Accounting Information
                    Technology (BSAIS), Bachelor of Science in Accountancy (BSA), Bachelor of Science in Tourism
                    Management (BSTM), Bachelor of Science in Hospitality Management (BSHM),
                    Bachelor of Science in Business Administration Major in Financial Management (BSBA-FMGT),Bachelor of
                    Science in Business Administration Major in Marketing Management (BSBA-MKMGT), Bachelor of Science
                    in Entrepreneurial Management (BSEM).
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span></span>COLLEGE
                  OF EDUCATION<i class="bx bx-chevron-down icon-show"></i><i
                    class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Bachelor in Elementary Education Major in Early Childhood Education (BEED EARLY CHILDHOOD
                    EDUCATION), Bachelor in Elementary Education Major in Special Education (BEED SPECIAL EDUCATION),
                    Bachelor in Secondary Education Major in Technology and Livelihood Education (BSE TLE), Bachelor in
                    Secondary Education Major in Science (BSE Science), Bachelor in Secondary Education Major in English
                    (BSE English),
                    Bachelor in Secondary Education Major in English - Chinese, Certificate in Professional Education,
                    Elementary | Secondary | P.E..
                  </p>
                </div>
              </li>
              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4" class="collapsed"><span></span>COLLEGE
                  OF CRIMINOLOGY<i class="bx bx-chevron-down icon-show"></i><i
                    class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    BS Criminology
                  </p>
                </div>
              </li>


            </ul>
          </div>

        </div>

        <div class="col-lg-5 order-1 order-lg-2 img" style='background-image: url("assets/img/TOUR-2.png");'>&nbsp;
        </div>
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
          <p class="fs-1 fw-bolder" style="color: #5080FF; font-size: 30px; font-family: Montserrat;"><b>OUR TEAM</b>
          </p><br>
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
              <p class="card-text">Front End Developer</p>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <div class="card" style="width: 12rem;">
            <div class="card-body">
              <h5 class="card-title">Yasmine Gail Doctor</h5>
              <p class="card-text">Front End Developer</p>
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

  <div class="container">
    <div class="wrapper">
      <img src="#" alt=""><i style="color: #fff;" class='bx bx-cookie bx-lg'></i>
      <div class="content">
        <header style="color: #fff;">Your privacy</header>
        <p>By clicking "Accept all cookies", you agree Program Recommendation System store cookies on your
          device and disclose information on accordance with our Cookie Policy</p>
        <div class="buttons">
          <button class="item">Accept all cookies</button>
          <a href="#" data-toggle="modal" data-target="#exampleModal" class="item">Learn more</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content" style="
          background: #2f3337;
          padding: 25px 25px 30px 25px;
          border-radius: 15px;
          text-align: center;">
        <div class="modal-header justify-content-center">
          <h5 class="modal-title " id="exampleModalLabel" style="color:#fff;">
            <i style="position: relative;" class='bx bx-cookie bx-lg'></i><br>
            Cookie Policy
          </h5>
          </button>
        </div>
        <div class="modal-body" style="color: #858585; ">
          Our website uses cookies to improve your browsing experience and to personalize content and ads. Cookies are
          small data files that are placed on your device when you visit our website. <br>
          They allow us to remember your preferences, such as your language and region, and to understand how you use
          our website.<br><br>
          We use both session cookies, which expire when you close your browser, and persistent cookies, which remain on
          your device until they expire or are deleted. <br>
          By using our website, you consent to the use of cookies in accordance with this policy. You can manage cookies
          in your browser settings. <br>
          Please note that disabling cookies may affect the functionality of our website and may prevent you from
          accessing certain features or content.<br><br>
          We may update this policy from time to time. The date of the last update is indicated at the top of this
          page.<br><br>
          If you have any questions or concerns about our use of cookies, please contact us at ucc.itech@gmail.com.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn " data-dismiss="modal" style="background: #5080ff; color: #fff;">I
            understand</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    const cookieBox = document.querySelector(".wrapper"),
      acceptBtn = cookieBox.querySelector("button");
    acceptBtn.onclick = () => {
      //setting cookie for 1 month, after one month it'll be expired automatically
      document.cookie = "Accepted Cookies=ProgRecSys; max-age=" + 60 * 60 * 24 * 30;
      if (document.cookie) { //if cookie is set
        cookieBox.classList.add("hide"); //hide cookie box
      } else { //if cookie not set then alert an error
        alert("Cookie can't be set! Please unblock this site from the cookie setting of your browser.");
      }
    }
    let checkCookie = document.cookie.indexOf("Accepted Cookies=ProgRecSys"); //checking our cookie
    //if cookie is set then hide the cookie box else show it
    checkCookie != -1 ? cookieBox.classList.add("hide") : cookieBox.classList.remove("hide");


  </script>


  <!-- IMPORTS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>

  <!-- END IMPORTS -->
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>

</body>

</html>