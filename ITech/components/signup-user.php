<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <title>Signup Form</title>
    <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">

    <!-- IMPORTS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- END IMPORTS -->
    

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
        body
        {
            background-color: #fff;
        }
            .wrong .fa-check
        {
            display: none;
        }
        .good .fa-times
        {
            display: none;
        }
            
        #navBar {
            
        /* Layout Properties */
        height: 150px;
        
        
        /* UI Properties */

        
        }
        
        #navLogo {
        
        /* Layout Properties */
        width: 100px;
        height: 100px;
        }
        .button {
        border: 1px solid #fff;
        border-radius: 20px;
        color: #fff;
        font-size: 11px;
        font-weight: 500;
        letter-spacing: 1px;
        padding: 15px 60px;
        text-decoration: none;
        text-transform: uppercase;
        }
      .submit-btn {
      border: none;
      border-radius: 25px;
      color: #fff;
      cursor: pointer;
      font-size: 11px;
      letter-spacing: 1px;
      margin-top: 15px;
      padding: 15px 50px;
      text-transform: uppercase;
      }
      #login .submit-btn {
      background: #5080ff;
      }
      #register .submit-btn {
      background: #5080ff;
      }
      #container {
      border-radius: 20px;
      height: 600px;
      margin:auto;
      overflow: hidden;
      }
      #register {
      background: #fff;
      float: right;
      height: 100%;
      position: relative;
      width: 50%;
      text-align: center;
      top: -2500px;
      z-index: 1;
      }
      #register h1 {
      padding: 10% 0 25px;
      }
      #register h1 {
      color: #5080ff;
      }
      #register p {
      font-size: 12px;
      font-weight: 300;
      letter-spacing: 0.3px;
      padding: 20px;
      }
      #input1{
      font-weight: 300;
      margin: 6px;
      padding: 6px;
      padding-bottom: 10px;

      }
      /* Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      /* Firefox */
      input[type=number] {
        -moz-appearance: textfield;
      }

      ::-moz-selection { /* Code for Firefox */
        color: white;
        background: gray;
      }

      ::selection {
        color: white;
        background: gray;
      }
      .error {
        border-color: red;
      }
      input:invalid {
        border-style: solid;
        border-width: 2px;
        border-color: red;
      }
      .form-control.is-invalid, .was-validated .form-control:invalid {
          margin-bottom: 0rem;
          background-image: none;
          border-color: #dc4c64;
      }
          
    </style>
</head>
<body>

<nav class="nav fixed-top navbar-light bg-white shadow" >
    <div class="container ">
        <div class="row justify-content-end align-items-center">  
            <div class="col-auto ">
                <a class="navbar-brand" href="../index.php"><img src="../img/logo.png"  id="navLogo">
                 </a>
            </div>
            <div class="col justify-content-start">
            Program Recommendation System 
            </div>
            <div class="col  text-center">
                    <a href="../index.php">
                    <button type="button" class="btn btn-light"><i class='bx bx-arrow-back bx-md'> </i>
                    </button> </a>
            </div>
        </div>
    </div>
</nav>



<section class="h-100" style="background-color: #eee; padding-top: 100px;" >
<?php
if(count($errors) > 0){
?>
<div class="d-flex p-2 justify-content-center">
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<button type="button" class="close" data-mdb-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<?php
foreach($errors as $showerror){
echo $showerror;
}
?>
</div>
</div>

<?php
}
?>
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
   
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="needs-validation mx-1 mx-md-4" action="signup-user.php" method="POST" autocomplete="" >
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline form-group flex-fill mb-0">
                      <input type="text" id="firstName" class="form-control" name="firstName" value="<?php echo $firstName ?>" autofocus required/>
                      <label class="form-label" for="firstName">First Name</label>
                    </div>
                  </div>
                  <div class="invalid-feedback mt-5">
                      Please input a valid First Name.
                    </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="lastName" class="form-control" name="lastName"   value="<?php echo $lastName ?>" required/>
                      <label class="form-label" for="lastName">Last Name</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="middleInitial" maxlength="3" name="middleInitial" value="<?php echo $middleInitial ?>" class="form-control"/>
                      <label class="form-label" for="middleInitial">Middle Initial (Optional)</label>
                    </div>

                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-mobile fa-lg me-3 fa-fw"></i>
                    <div class="form-outline input-group flex-fill mb-0">
                    <div class="input-group-text">+63</div>
                      <input type="text" id="phone" class="form-control" name="phoneNumber"  value="<?php echo $phone ?>" required/>
                      <label class="form-label" for="phone" >Mobile Number</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="email" class="form-control" name="regemail"  value="<?php echo $email ?>" required/>
                      <label class="form-label" for="email">Your Email</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline input-group flex-fill mb-0">
                          <input class="form-control" id="password-input" name="password" type="password" required/>
                          <label class="form-label" for="password-input">Password</label>
                          <div class="input-group-append" role="button" title="veiw password" id="passBtn">
                          <span class="input-group-text" style="background: #fff; border: none;" >
                          <i class=" far fa-eye fa-eye-slash" id="togglePassword" style= "cursor: pointer;" aria-hidden="true"></i>
                          </span>
                          </div>
                          <script>
                              //*<-----Show password script----->
                              const togglePassword = document.querySelector('#togglePassword');
                                  const password = document.querySelector('#password-input');
                                  togglePassword.addEventListener('click', function (e) {
                                      // toggle the type attribute
                                      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                                      password.setAttribute('type', type);
                                      // toggle the eye slash icon
                                      this.classList.toggle('fa-eye-slash');
                                  });
                          </script> 
                          </div>
                      </div>
                  <div class="col-6 mt-4 w-auto h-auto">
                        <div class="alert px-4 py-3 mb-0 d-none" role="alert" data-mdb-color="warning" id="password-alert">
                          <ul class="list-unstyled mb-0">
                            <li class="requirements leng">
                              <i class="fas fa-check text-success me-2"></i>
                              <i class="fas fa-times text-danger me-3"></i>
                              Your password must have at least 8 chars</li>
                            <li class="requirements big-letter">
                              <i class="fas fa-check text-success me-2"></i>
                              <i class="fas fa-times text-danger me-3"></i>
                              Your password must have at least 1 big letter.</li>
                            <li class="requirements num">
                              <i class="fas fa-check text-success me-2"></i>
                              <i class="fas fa-times text-danger me-3"></i>
                              Your password must have at least 1 number.</li>
                            <li class="requirements special-char">
                              <i class="fas fa-check text-success me-2"></i>
                              <i class="fas fa-times text-danger me-3"></i>
                              Your password must have at least 1 special char.</li>
                          </ul>
                          </div>
                    </div><br> 
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline input-group flex-fill mb-0">
                      <input type="password" id="password-confirmation" onkeyup="stoppedTyping()" name="cpassword" class="form-control" required/>
                      <label class="form-label" for="password-confirmation">Repeat your password</label>
                      <div class="input-group-append" role="button" title="veiw password" id="passBtn">
                          <span class="input-group-text" style="background: #fff; border: none;" >
                          <i class=" far fa-eye fa-eye-slash" id="togglePassword1" style= "cursor: pointer;" aria-hidden="true"></i>
                          </span>
                      </div>
                      <script>
                          //*<-----Show password script----->
                          const togglePassword1 = document.querySelector('#togglePassword1');
                              const password1 = document.querySelector('#password-confirmation');
                              togglePassword1.addEventListener('click', function (e) {
                                  // toggle the type attribute
                                  const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
                                  password1.setAttribute('type', type);
                                  // toggle the eye slash icon
                                  this.classList.toggle('fa-eye-slash');
                              });
                      </script> 
                      </div>
                    <div style="margin-left: 50px; margin-top: 80px; position: absolute;" id="checkpass">
                    </div>

                 
                  </div>
                 <br>
                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label " for="form2Example3">
                      By continuing, you have read and agree to the
                       <a data-mdb-toggle="modal" data-mdb-target="#disclaimerModal" href="">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button id="submit_btn" type="submit" name="signup" class="btn btn-primary btn-lg" value="Register" disabled>Register</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="../img/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="disclaimerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TERMS OF SERVICE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      By completing the registration process, you acknowledge and agree that all the information you provide, including personal and non-personal data, 
      will be saved and stored by us for the purpose of maintaining your account and providing you with our services. <br><br>
      
      We will take reasonable measures to ensure that
      your data is kept secure and will not be disclosed to third parties without your consent, except as required by law. However,
      we cannot guarantee the absolute security of your data and you use our services at your own risk. If you do not agree with these terms, please do not proceed with the registration process.<br>
      
      Introduction<br>
      Welcome to our website. By using this website, you agree to be bound by the following terms and conditions. 
      If you do not agree to these terms and conditions, please do not use this website.<br><br>

      Intellectual Property<br>
      All content on this website, including but not limited to text, graphics, logos, images, and software, is the property of our website and is protected by copyright and other intellectual property laws.
      You may not copy, reproduce, modify, distribute, or display any content from this website without our prior written consent.<br><br>

      Use of Website<br>
      You may use this website for lawful purposes only. You may not use this website in any way that could damage or disrupt our website, or interfere with any other party's use and enjoyment of this website.<br><br>

      User Content<br>
      Any content that you submit or post on this website, including but not limited to comments, reviews, and ratings, must be your original work and not infringe on the intellectual property or privacy rights of any third party.<br>
       By submitting or posting content on this website, you grant us a non-exclusive, royalty-free, perpetual, and worldwide license to use, modify, and distribute the content in any way we see fit.<br><br>

      Links to Third-Party Websites<br>
      This website may contain links to third-party websites for your convenience. We do not endorse or assume any responsibility for the content or availability of these websites.<br><br>

      Modification of Terms and Conditions<br>
      We reserve the right to modify these terms and conditions at any time without prior notice. Your continued use of this website after any such modification constitutes your acceptance of the modified terms and conditions.<br><br>

      Governing Law<br>
      These terms and conditions shall be governed by and construed in accordance with the laws of Supreme Court of the Philippines. Any dispute arising from these terms and conditions shall be subject to the exclusive jurisdiction of the courts of Philippines.<br><br>

      Contact Us<br>
      If you have any questions or concerns about these terms and conditions, please contact us at ucc.itech@gmail.com<br><br>
      </div>
      <div class="modal-footer">
        <button type="button"  data-mdb-dismiss="modal" class="btn btn-primary">Proceed</button>
      </div>
    </div>
  </div>
</div>

<script>
  const inputField = document.getElementById('firstName');

  inputField.addEventListener('blur', function() {
    let input = inputField.value.trim();

    // Check if the input is valid
    if (input.length < 5) {
      // Set the input field to display an error message
      inputField.classList.add('error');
    } else {
      // Remove any error message from the input field
      inputField.classList.remove('error');
    }
  });

   // Check if password and password confirmation match
   var password = document.getElementById("password-input");
    var passwordConfirmation = document.getElementById("password-confirmation");

    if (password.value !== passwordConfirmation.value) {
      passwordConfirmation.setCustomValidity("Passwords do not match.");
    } else {
      passwordConfirmation.setCustomValidity('');
    }

</script>

<script>
  const mobileNumberInput = document.getElementById('phone');
  
  mobileNumberInput.addEventListener('input', function(e) {
    let input = e.target.value;
    
    // Remove all non-numeric characters from the input
    input = input.replace(/\D/g, '');
    
    // Apply the formatting pattern
    let formattedInput = '';
    for (let i = 0; i < input.length; i++) {
      if (i === 0) {
        formattedInput += '(' + input[i];
      } else if (i === 3) {
        formattedInput += ') ' + input[i];
      } else if (i === 6) {
        formattedInput += '-' + input[i];
      } else {
        formattedInput += input[i];
      }
    }
    
    // Set the formatted input as the value of the input field
    mobileNumberInput.value = formattedInput;
  });
</script>

<script>
  var firstNameInput = document.getElementById("firstName");

  firstNameInput.addEventListener('input', function(event) {
    if (/[\d]/.test(firstNameInput.value)) { // Test if the input contains a number
      firstNameInput.classList.add("is-invalid"); // Add the is-invalid class to show error styling
    } else {
      firstNameInput.classList.remove("is-invalid"); // Remove the is-invalid class if input is valid
    }
  });
  var lastNameInput = document.getElementById("lastName");

lastNameInput.addEventListener('input', function(event) {
  if (/[\d]/.test(lastNameInput.value)) { // Test if the input contains a number
    lastNameInput.classList.add("is-invalid"); // Add the is-invalid class to show error styling
  } else {
    lastNameInput.classList.remove("is-invalid"); // Remove the is-invalid class if input is valid
  }
});
var MIInput = document.getElementById("middleInitial");

MIInput.addEventListener('input', function(event) {
  if (/[\d]/.test(MIInput.value)) { // Test if the input contains a number
    MIInput.classList.add("is-invalid"); // Add the is-invalid class to show error styling
  } else {
    MIInput.classList.remove("is-invalid"); // Remove the is-invalid class if input is valid
  }
});
</script>

<script>
  const emailInput = document.getElementById('email');

  emailInput.addEventListener('input', function(e) {
    let input = e.target.value.trim();

    // Check if the input contains "@"
    if (input.includes('@')) {
      // Split the input into username and domain parts
      const [username, domain] = input.split('@');
      // If the domain is not "gmail.com", don't auto-fill or validate
      if (domain !== 'gmail.com') {
        emailInput.setCustomValidity('Please enter a valid Gmail address');
        return;
      }
      // Auto-fill the domain with "@gmail"
      e.target.value = `${username}@gmail.com`;
    }

    // Check if the input is a valid email address
    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(e.target.value)) {
      emailInput.setCustomValidity('Please enter a valid email address');
    } else {
      emailInput.setCustomValidity('');
    }
  });
</script>
<script>
  
const phoneInput = document.getElementById("phone");
const phoneError = document.getElementById("phone-error");

phoneInput.addEventListener("input", function() {
  // Remove any non-digit characters
  let phone = this.value.replace(/\D/g, "");

  // Check if the phone number is valid
  let isValid = false;

  // Use regular expressions to validate the phone number
  if (phone.match(/^(\+|00)(\d{1,3})\s?(\d{3})\s?(\d{4})\s?(\d{3})?$/)) {
    isValid = true;
  }

  // Update the error message
  if (isValid) {
    phoneError.innerHTML = "";
    phoneInput.setCustomValidity("");
  } else {
    phoneError.innerHTML = "Please enter a valid mobile phone number with country code.";
    phoneInput.setCustomValidity("Invalid mobile phone number.");
  }
});


  var max_chars = 14;
    
    $('#phone').keydown( function(e){
        if ($(this).val().length >= max_chars) { 
            $(this).val($(this).val().substr(0, max_chars));
        }
    });
        
    $('#phone').keyup( function(e){
        if ($(this).val().length >= max_chars) { 
            $(this).val($(this).val().substr(0, max_chars));
        }
    });



$(document).ready(function () {
   $("#password-confirmation").on('keyup', function(){
    var password = $("#password-input").val();
    var confirmPassword = $("#password-confirmation").val();
    if (password != confirmPassword)
        $("#checkpass").html("Password does not match").css("color","red");
    else
        $("#checkpass....").html("Password match").css("color","green");
   });
});

  </script>
  <!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>

    <script>
    //*<-----Show password script----->
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
    </script> 

<script>

(function () {
    'use strict';
    window.addEventListener('load', function () {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

  // get email input field
var emailInput = document.getElementById("email");

// add event listener to email input field
emailInput.addEventListener("input", function() {
  var email = emailInput.value;
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // regular expression for email pattern
  if (!emailPattern.test(email) || email.indexOf("@gmail.com") == -1) {
    emailInput.classList.add("is-invalid"); // add "is-invalid" class to input field
  } else {
    emailInput.classList.remove("is-invalid"); // remove "is-invalid" class from input field
  }
});
</script>

<script>
  addEventListener("DOMContentLoaded", (event) => {
    const password = document.getElementById("password-input");
    const passwordAlert = document.getElementById("password-alert");
    const requirements = document.querySelectorAll(".requirements");
    let lengBoolean, bigLetterBoolean, numBoolean, specialCharBoolean;
    let leng = document.querySelector(".leng");
    let bigLetter = document.querySelector(".big-letter");
    let num = document.querySelector(".num");
    let specialChar = document.querySelector(".special-char");
    const specialChars = "!@#$%^&*()-_=+[{]}\\|;:'\",<.>/?`~";
    const numbers = "0123456789";

    requirements.forEach((element) => element.classList.add("wrong"));

    password.addEventListener("focus", () => {
        passwordAlert.classList.remove("d-none");
        if (!password.classList.contains("is-valid")) {
            password.classList.add("is-invalid");
        }
    });

    password.addEventListener("input", () => {
        let value = password.value;
        if (value.length < 8) {
            lengBoolean = false;
        } else if (value.length > 7) {
            lengBoolean = true;
        }

        if (value.toLowerCase() == value) {
            bigLetterBoolean = false;
        } else {
            bigLetterBoolean = true;
        }

        numBoolean = false;
        for (let i = 0; i < value.length; i++) {
            for (let j = 0; j < numbers.length; j++) {
                if (value[i] == numbers[j]) {
                    numBoolean = true;
                }
            }
        }

        specialCharBoolean = false;
        for (let i = 0; i < value.length; i++) {
            for (let j = 0; j < specialChars.length; j++) {
                if (value[i] == specialChars[j]) {
                    specialCharBoolean = true;
                }
            }
        }

        if (lengBoolean == true && bigLetterBoolean == true && numBoolean == true && specialCharBoolean == true) {
            password.classList.remove("is-invalid");
            password.classList.add("is-valid");

            requirements.forEach((element) => {
                element.classList.remove("wrong");
                element.classList.add("good");
            });
            passwordAlert.classList.remove("alert-warning");
            passwordAlert.classList.add("alert-success");
        } else {
            password.classList.remove("is-valid");
            password.classList.add("is-invalid");

            passwordAlert.classList.add("alert-warning");
            passwordAlert.classList.remove("alert-success");

            if (lengBoolean == false) {
                leng.classList.add("wrong");
                leng.classList.remove("good");
            } else {
                leng.classList.add("good");
                leng.classList.remove("wrong");
            }

            if (bigLetterBoolean == false) {
                bigLetter.classList.add("wrong");
                bigLetter.classList.remove("good");
            } else {
                bigLetter.classList.add("good");
                bigLetter.classList.remove("wrong");
            }

            if (numBoolean == false) {
                num.classList.add("wrong");
                num.classList.remove("good");
            } else {
                num.classList.add("good");
                num.classList.remove("wrong");
            }

            if (specialCharBoolean == false) {
                specialChar.classList.add("wrong");
                specialChar.classList.remove("good");
            } else {
                specialChar.classList.add("good");
                specialChar.classList.remove("wrong");
            }
        }
    });

    password.addEventListener("blur", () => {
        passwordAlert.classList.add("d-none");
    });
});
</script>

<script>

  const inputs = document.querySelectorAll('input[required]');
  const submitBtn = document.querySelector('button[type="submit"]');

  // Add event listener to each required input
  inputs.forEach(input => {
    input.addEventListener('input', () => {
      // Check if all required inputs are filled out
      const isFormValid = [...inputs].every(input => input.value !== '');

      // Enable/disable submit button based on form validation
      submitBtn.disabled = !isFormValid;
    });
  });

</script>

</body>
</html>