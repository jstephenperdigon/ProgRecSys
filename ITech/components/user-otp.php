<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Code Verification</title>
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
            <!-- IMPORTS -->
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
    <style> 
input[type="number"]{
    width: 50px;
    height: 50px
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0
}

.card-2 {
    width: 400px;
    height: 400px;
}

.form-control:focus {
    box-shadow: none;
    border: 2px solid #5080ff;
}

.validate {
    border-radius: 20px;
    height: 40px;
    background-color: red;
    border: 1px solid red;
    width: 140px
}
</style>
</head>
<body>

<section class="dark">
<div class="card-2 container height-100 d-flex justify-content-center align-items-center" style="margin-top: 300px;">
<form id="otp-form" class="needs-validation" action="user-otp.php" method="POST" autocomplete="off" novalidate>
<h5 class="text-center">VERIFICATION CODE SENT<div class="fa fa-check-circle" style="color: green;" width="24" height="24" role="img" aria-label="Success:"></div></h5>
<?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                    <?php
                    }
                    ?>
                       <?php
                    if(count($errors) > 0){
                        foreach($errors as $showerror){
                        ?>
                        <div class="container alert alert-danger text-center">
                            <?php
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
  <div class="form-group">
    <div class="input-group d-flex flex-row justify-content-center mt-2 mb-3">
      <input type="number" style="height: 55px; width: 40px; border-radius: 15px;" class="m-2 form-control otp-input text-center" name="otp1" maxlength="1" id="input1" autofocus required/>
      <input type="number" style="height: 55px; width: 40px; border-radius: 15px;" class="m-2 form-control otp-input text-center bg-white " name="otp2" maxlength="1" id="input2" disabled required/>
      <input type="number" style="height: 55px; width: 40px; border-radius: 15px;" class="m-2 form-control otp-input text-center bg-white " name="otp3" maxlength="1" id="input3" disabled required/>
      <input type="number" style="height: 55px; width: 40px; border-radius: 15px;" class="m-2 form-control otp-input text-center bg-white " name="otp4" maxlength="1" id="input4" disabled required/>
      <input type="number" style="height: 55px; width: 40px; border-radius: 15px;" class="m-2 form-control otp-input text-center bg-white " name="otp5" maxlength="1" id="input5" disabled required/>
      <input type="number" style="height: 55px; width: 40px; border-radius: 15px;" class="m-2 form-control otp-input text-center bg-white " name="otp6" maxlength="1" id="input6" disabled required/>
    </div>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please enter a valid OTP code.</div>
  </div>
  <div class="text-center">
<!-- Resend OTP button with 60 seconds timer -->
<button id="resend-otp" class="mt-4 btn btn-primary btn-lg btn-rounded form-control mt-5" disabled>Resend OTP</button>


  <button type="submit" id="otp-check" name="check" class="btn btn-primary mt-5 invisible">SUBMIT</button>
  </div>

</form>
</div>
</section>




<script>
// Get all the OTP input fields
var otpInputs = document.querySelectorAll('.otp-input');

// Add event listener to each input field
otpInputs.forEach(function(input, index) {
  input.addEventListener('keydown', function(event) {
    // If the key pressed is the backspace key and the input is empty, focus on the previous input
    if (event.key === 'Backspace' && input.value.length === 0) {
      if (index !== 0) {
        otpInputs[index - 1].focus();
      }
    }
  });
});

// BACK SPACE KEY FOR OTP INPUT FIELDS // 
// Get all the OTP input fields
var otpInputs = document.querySelectorAll('.form-control');

// Add event listener to each input field
otpInputs.forEach(function(input, index) {
  input.addEventListener('input', function() {
    // If the current input field is the first one and has no value, do nothing
    if (index === 0 && input.value.length === 0) {
      return;
    }

    // If the current input field has a value, enable the next input field
    input.nextElementSibling.disabled = false;

    // If the current input field is the last one, submit the OTP
    if (index === otpInputs.length - 1) {
      submitOTP();
    }
  });
});

// BACK SPACE KEY FOR OTP INPUT FIELDS // 

// RESEND OTP TIMER //
const resendOtpButton = document.getElementById("resend-otp");
let timer = getRemainingTime(); // Get remaining time from localStorage, or set to 60 seconds

// Start countdown timer
const countdown = setInterval(() => {
  timer--;
  if (timer === 0) {
    clearInterval(countdown);
    enableResendOtpButton();
  } else {
    updateResendOtpButton();
  }
}, 1000);

// Add event listener to resend OTP code when button is clicked
resendOtpButton.addEventListener("click", () => {
  // Resend the OTP code here
  setLastClickTimestamp();
  disableResendOtpButton();
  timer = 60;
  countdown();
});

// Helper functions
function getRemainingTime() {
  const lastClickTimestamp = localStorage.getItem("resend-otp-timestamp");
  if (lastClickTimestamp) {
    const elapsedSeconds = Math.floor((Date.now() - lastClickTimestamp) / 1000);
    return Math.max(60 - elapsedSeconds, 0);
  } else {
    return 60;
  }
}

function setLastClickTimestamp() {
  localStorage.setItem("resend-otp-timestamp", Date.now());
}

function disableResendOtpButton() {
  resendOtpButton.disabled = true;
  resendOtpButton.classList.add("disabled");
}

function enableResendOtpButton() {
  resendOtpButton.disabled = false;
  resendOtpButton.textContent = "Resend OTP";
  resendOtpButton.classList.remove("disabled");
  localStorage.removeItem("resend-otp-timestamp"); // Remove timestamp from localStorage when timer reaches zero
}

function updateResendOtpButton() {
  resendOtpButton.textContent = `Resend OTP: ${timer}s`;
}

// RESEND OTP TIMER // 

</script>

<script>
$(function() {

        // Autofocus on the next input field after the user inputs 1 value
        $(document).ready(function(){
            $('input').on("input", function(){
            if($(this).val().length==$(this).attr("maxlength")){
            $(this).next().focus();
            }
            });
        });


            const inputs = document.querySelectorAll('input');
            const submitBtn = document.getElementById('otp-check');

            inputs.forEach(input => {
            input.addEventListener('input', () => {
            if (inputs[0].value && inputs[1].value && inputs[2].value && inputs[3].value && inputs[4].value && inputs[5].value) {
            submitBtn.click();
            }
        });
        });
});
</script>


    <!-- IMPORTS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    <!-- END IMPORTS -->
</body>
</html>